<?php

namespace App\Http\Controllers;

use App\Events;
use App\EventSeats;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Repository\EventRepository;
use Users;

class ApiController extends Controller
{

    private $user;

    private $event;

    public function __construct(EventRepository $event, UserRepository $user) {
        $this->event = $event;
        $this->user = $user;
    }

    public function getEvents()
    {
        $upcoming = $this->event->getUpcoming();
        $completed = $this->event->getCompleted();
        $upcoming = $upcoming->toArray();
        $count = 0;
        foreach($upcoming as $event) {
            $count++;
            if ($count == 1 || $count == 4) {
                $upcoming[$count - 1]["className"] = "first_event";
            } elseif ($count % 3 == 0) {
                $upcoming[$count - 1]["className"] = "third_event";
            }elseif ($count == 2 || $count == 5) {
                $upcoming[$count - 1]["className"] = "second_event";
            }
        }
        $count2 = 0;
        foreach($completed as $event) {
            $count2++;
            if ($count2 == 1 || $count2 == 4) {
                $completed[$count2 - 1]["className"] = "first_event";
            } elseif ($count2 % 3 == 0) {
                $completed[$count2 - 1]["className"] = "third_event";
            }elseif ($count2 == 2 || $count2 == 5) {
                $completed[$count2 - 1]["className"] = "second_event";
            }
        }
        $response["upcoming"] = $upcoming;
        $response["completed"] = $completed;
        echo json_encode($response);
    }

    public function getEvent(Events $events)
    {
        return json_encode($events);
    }

    public function getSeats(Events $events)
    {
        $seats = EventSeats::where('event_id', $events->id)->get();

        $final = [];
        foreach ($seats->toArray() as $seat) {
            $seat["hovered"] = false;
            $final[] = $seat;
        }

        $final = array_chunk($final, 16);

        echo json_encode($final);

    }

    public function login(Request $request)
    {
        $response = $this->user->apiLogin($request);
        if (!is_bool($response)) {
            echo json_encode($array['message'] = $response);
        }
    }
    public function register(Request $request)
    {
        $response = $this->user->apiRegister($request);
        if (!is_bool($response)) {
            echo json_encode($array['message'] = $response);
        }
    }


    public function isSignedIn()
    {
        if (Users::isSignedIn()) {
            $username = \Users::Get()->username;
            $response['userData'] = ['username' => $username];
            echo json_encode($response);
        } else {
            echo "failed";
        }
    }
}

