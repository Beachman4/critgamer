<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    private $user;

    /**
     * AdminController constructor.
     * @param $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function getIndex()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'username_email' => 'required',
            'password' => 'required'
        ]);
        $return = $this->user->login($request);
        if ($return === true) {
            return redirect()->route('admin_index');
        }
        $request->session()->flash('loginMessage', $return);
        return redirect()->back()->withInput();
    }
}
