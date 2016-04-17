@extends('template.master')
@section('content')
    <div class="row small-up-1 medium-up-2 large-up-4">
        <div class="column">
            <img src="{{ URL::asset('assets/img/kelby.jpg') }}">
            <h3 style="text-align: center;">Kelby Hill</h3>
            <p style="color: red; text-align: center;">Administration</p>
        </div>
        <div class="column">
            <img src="{{ URL::asset('assets/img/andrew.jpg') }}">
            <h3 style="text-align: center;">Andrew Aguillard</h3>
            <p style="color: red; text-align: center;">Systems Manager</p>
        </div>
        <div class="column">
            <img src="{{ URL::asset('assets/img/taylor.jpg') }}">
            <h3 style="text-align: center;">Taylor Miller</h3>
            <p style="color: red; text-align: center;">Marketing Manager</p>
        </div>
        <div class="column">
            <img src="{{ URL::asset('assets/img/kirk.jpg') }}">
            <h3 style="text-align: center;">Kirk Molloy</h3>
            <p style="color: red; text-align: center;">Operations Director</p>
        </div>
    </div>
@stop