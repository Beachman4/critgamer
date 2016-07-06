<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Events;
use Carbon\Carbon;

class EventRepository extends Repository
{

    /**
     * EventRepository constructor.
     */
    public function __construct(Events $model)
    {
        $this->model = $model;
    }

    /*
     * Call custom Eloquent queries below
     */

    public function getEvents()
    {
        return $this->model->where('end', '>', Carbon::now())->orderBy('start')->get();
    }

    public function getUpcoming()
    {
        return $this->model->where('end', '>', Carbon::now())->orderBy('start')->get();
    }

    public function getCompleted()
    {
        return $this->model->where('end', '<', Carbon::now()) ->orderBy('start')->get();
    }
}


