@extends('frontend.templates.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 text-lg-center">
            <h1>Our Sponsers</h1>
        </div>
    </div>
    <div class="block-grid-xs-1 block-grid-sm-1 block-grid-md-2 block-grid-lg-3">
        @foreach($sponsers as $sponser)
            <div>
                <a href="{{ $sponser->link }}"><img src="/image/{{ $sponser->picture }}"></a>
            </div>
        @endforeach
    </div>
@stop