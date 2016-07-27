<?php

namespace App\Http\Controllers;

use App\Events;
use App\Repository\EventRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventsController extends Controller
{

    private $event;

    /**
     * EventsController constructor.
     * @param $event
     */
    public function __construct(EventRepository $event)
    {
        $this->event = $event;
    }


    public function index()
    {
        return view('frontend.events.index');
    }

    public function adminIndex()
    {
        $events = $this->event->all();
        return view('admin.events.index', [
            'events' => $events
        ]);
    }

    public function adminCreate()
    {

    }

    public function adminStore(Request $request)
    {

    }

    public function adminView(Events $event)
    {

    }
}
