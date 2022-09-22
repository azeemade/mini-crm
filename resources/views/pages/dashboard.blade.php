@extends('layout.app')
@section('content')
    <div class="">
        <p>Welcome to your dashboard 
            <strong class="text-sky-600">{{Auth::user()->email}}</strong>
        </p>
    </div>
@stop