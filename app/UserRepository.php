<?php

namespace App\Repository;

use App\Events\UserHasRegistered;
use App\Repository\Repository;
use App\User;
use Hash;
use Users;

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
}


