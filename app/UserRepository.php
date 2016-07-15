<?php

namespace App\Repository;

use App\Events;
use App\Events\Event;
use App\Events\SeatWasBought;
use App\Events\UserHasRegistered;
use App\EventSeats;
use App\Repository\Repository;
use App\User;
use Hash;
use Stripe\Customer;
use Stripe\Error\Api;
use Stripe\Error\ApiConnection;
use Stripe\Error\Card;
use Stripe\Error\InvalidRequest;
use Stripe\Stripe;
use Users;
use Illuminate\Http\Request;

class UserRepository extends Repository
{

    /**
     * UserRepository constructor.
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /*
     * Call custom Eloquent queries below
     */

    public function apiLogin($request)
    {
        $username_email = $request->input('username_email')['value'];
        $password = $request->input('password')['value'];
        if ($user = $this->model->where('username', $username_email)->orWhere('email', $username_email)->first()) {
            if (Hash::check($password, $user->password)) {
                Users::signUserIn($user->id);
                return true;
            } else {
                return "Your Username/Password is incorrect.";
            }
        } else {
            return "Your Username/Password is incorrect.";
        }
    }
    public function apiRegister($request)
    {
        $username = $request->input('username')['value'];
        $user = new $this->model;
        $user->username = $username;
        $email = $request->input('email')['value'];
        if ($this->model->where('email', $email)->count() > 0) {
            return 'Email has been taken.';
        } else {
            $user->email = $email;
        }
        $password = $request->input('password')['value'];
        $user->password = Hash::make($password);
        /*$token = $this->model->generateConToken();
        $user->confirm_token = $token;*/
        if ($user->save()) {
            //event(new UserWasCreated($user));
            Users::signUserIn($user->id);
            event(new UserHasRegistered($user));
            return true;
        }
        return "Something went wrong";
    }
    public function customerInfo(Request $request)
    {
        $user = \Users::Get();
        $user->first_name = $request->input('first_name')['value'];
        $user->last_name = $request->input('last_name')['value'];
        $user->address = $request->input('address')['value'];
        $user->city = $request->input('city')['value'];
        $user->state = $request->input('state')['value'];
        $user->zip = $request->input('zip')['value'];
        $user->save();
    }

    public function buySeat(Request $request)
    {
        $user = Users::Get();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Customer::create(array(
            "description" => "Customer for Crit Gamer",
            "source" => $request->input('customerKey')
        ));
        $user->stripe_id = $customer["id"];
        if ($last4 = $request->input('last4') != "") {
            $user->card_last_four = $last4;
        }
        if ($brand = $request->input('brand') != "") {
            $user->card_brand = $brand;
        }
        $user->save();
        $event = Events::find($request->input('event'));
        $price = $event->price * 100;
        try {
            $response = $user->charge($price);
        } catch(\Stripe\Error\Card $e) {
            // Since it's a decline, \Stripe\Error\Card will be caught
            return $e->getJsonBody();
        } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
        } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
        } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
        }
        $seat = EventSeats::find($request->input('selectedSeat'));
        $seat->users_id = $user->id;
        $seat->save();
        $user_id = $user->id;
        $seat_id = $seat->id;
        event(new SeatWasBought($user_id, $seat_id));
        return true;

    }
}


