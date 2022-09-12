@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="banner">
            <img src="{{$activity->image}}" alt="" class="img-fluid w-100 h-100">
            <div class="container">
                <div class="col-md-5 col-12 content">
                    <h1>{{$activity->currentMl->name}}</h1>
                    <p>{{$activity->currentMl->short_descripiton}}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12 project-page py-4">
                    {!! $activity->currentMl->text !!}
                </div>
            </div>
        </div>
    </div>
@endsection
