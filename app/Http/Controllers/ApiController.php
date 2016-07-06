<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Repository\EventRepository;

class ApiController extends Controller
{

    private $event;

    public function __construct(EventRepository $event) {
        $this->event = $event;
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
}

