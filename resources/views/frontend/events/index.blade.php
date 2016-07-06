@extends('frontend.templates.master')
@section('content')
	{{--<events></events>--}}
	<router-view></router-view>
	<script src="{{ URL::asset('js/main.js') }}"></script>
@stop