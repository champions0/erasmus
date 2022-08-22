@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="container">
            <div class="col-md-6 col-12 p-0 mt-5">
                <h1 class="page-title">{{__("Materials")}}</h1>
                <p class="page-desc py-3">{{__("In the framework of the project several training events, workshops and youth
                    exchanges are organized")}}</p>
            </div>
            <hr class="page-header-line">
            <div class="row block-list materials px-3 py-4">

                <!-- start loop item -->
                @foreach($materials as $material)
                    <div class="col-md-4 col-12 mb-4">
                        <div class="item p-4">
                            <h3>{{$material->currentMl->title}}</h3>
                            <p class="desc">{{$material->currentMl->text}}</p>
                            <h5>{{__("Language")}}</h5>
                            <div class="language">
                                <span class="active">AM</span>
                                <span>GB</span>
                                <span>UA</span>
                                <span>+4</span>
                            </div>
                            <a href="">{{__("Download File")}}</a>
                        </div>
                    </div>
                @endforeach
                <!-- end loop item -->

            </div>

            <!-- start pagination -->
            {{$materials->links()}}
{{--            <div class="row justify-content-center align-items-center pagination">--}}
{{--                <span class="mr-5">1-6 of 12</span>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="">--}}
{{--                            <img src="/images/pagination-left-arrow.svg" alt="">--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="active"><a href="">1</a></li>--}}
{{--                    <li><a href="">2</a></li>--}}
{{--                    <li>--}}
{{--                        <a href="">--}}
{{--                            <img src="/images/pagination-right-arrow.svg" alt="">--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

            <!-- end pagination -->
        </div>
    </div>

@endsection
