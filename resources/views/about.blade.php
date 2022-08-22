@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="banner">
            <img src="/images/banner.png" alt="" class="img-fluid w-100 h-100">
            <div class="container">
                <div class="col-md-5 col-12 content">
                    <h1>{{__("What we do !")}}</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="wrapper-inner">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                    orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>

                <div class="row links-block justify-content-between mt-5">
                    <div class="col-md-5 col-12 link-item">
                        <h3>{{__("Our activities")}}</h3>
                        <a href="{{route('activities')}}">{{__("Explore more")}}</a>
                    </div>
                    <div class="col-md-5 col-12 link-item">
                        <h3>{{__("Materials")}}</h3>
                        <a href="{{route('materials')}}">{{__("Explore more")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
