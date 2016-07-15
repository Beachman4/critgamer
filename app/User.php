<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class User extends Model
{
    use Billable;

    protected $guarded = ['password'];
    protected $hidden = ['password'];
}
