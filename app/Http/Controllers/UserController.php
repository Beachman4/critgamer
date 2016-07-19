<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Admin;

use App\Http\Requests;

class UserController extends Controller
{

    private $user;

    /**
     * UserController constructor.
     * @param $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logOut()
    {
        if (\Users::isSignedIn()) {
            \Users::signOut();
        }
        return redirect()->back();
    }

    public function adminIndex()
    {
        $users = $this->user->all();

        Admin::title("Users");
        Admin::button('New User', '/admin/users/create');

        Admin::breadcrumb('Dashboard', '/admin');
        Admin::breadcrumb('Users', '/admin/users');

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function adminView(User $user)
    {

    }

    public function adminEdit(User $user)
    {

    }

    public function adminUpdate(User $user)
    {

    }

    public function adminCreate(User $user)
    {

    }

    public function adminStore(User $user)
    {

    }

    public function adminDelete(User $user)
    {
        $this->user->delete($user->id);
        return redirect('/admin/users');
    }
}
