@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="banner">
            <img src="/images/about.png" alt="" class="img-fluid w-100 h-100">
            <div class="container">
                <div class="col-md-5 col-12 content">
                    <h1>{{__("What we do !")}}</h1>
                    <p>{{__("Empowering young people’s entrepreneurship skills")}} </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="wrapper-inner">
                <p>{{__("Promovent is a project funded by Erasmus+ aiming at empowering young people’s participation in entrepreneurship connecting the latter with the analogous challenge felt in participating European countries. The project provides young people with the knowledge, skills and motivation to plan and execute entrepreneurship activities and encourage entrepreneurial success. The project features a set of training for trainers, workshops, youth exchanges etc. Promovent is implemented by the partnership of 6 organizations: Stepanavan Youth Center NGO (Armenia), Alliance for Society Advancement (Georgia), Asociacion Juvenil Intercambia (Spain), Asociatia Se Poate (Romania), Mine Vaganti NGO (Italy), and Ukrainian Catholic University (Ukraine).")}}</p>
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
