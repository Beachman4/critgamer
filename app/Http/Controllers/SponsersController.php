<?php

namespace App\Http\Controllers;

use App\Sponser;
use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;

class SponsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsers = Sponser::all();
        return view('admin.sponsers.index', [
            'sponsers' => $sponsers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsers.create', [
            'edit' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $file = $request->file('picture');
        $name = uniqid(rand(), true);
        Storage::put('images/'.$name, file_get_contents($file->getRealPath()));

        Sponser::create([
            'title' => $request->input('title'),
            'picture' => $name
        ]);

        return redirect('/admin/sponsers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponser = Sponser::findOrFail($id);
        return view('admin.sponsers.view', [
            'sponser' => $sponser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponser = Sponser::findOrFail($id);
        return view('admin.sponsers.create', [
            'sponser' => $sponser,
            'edit' => true
        ]);
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
        $this->validate($request, [
            'title' => 'required'
        ]);
        $sponser = Sponser::findOrFail($id);

        dd($request->file('picture'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponser = Sponser::findOrFail($id);
        $sponser->delete();
        return redirect('/admin/sponser');
    }
}
