@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="container">
            <div class="col-md-6 col-12 p-0 mt-5">
                <h1 class="page-title">{{__("Gallery")}}</h1>
                <p class="page-desc py-3">{{__("Moments from our activities")}}</p>
            </div>
            <hr class="page-header-line">
            <div class="row block-list gallery px-1 py-4">

                <!-- start loop item -->
                @foreach($images as $image)
                    <div class="col-md-6 col-12">
                        <div class="item position-relative">
                            <a data-fancybox="group-1" href="{{$image->path}}" class="colorbox img-inherit">
                                <img src="{{$image->path}}" alt="" class="img-fluid w-100 h-100">
                            </a>

                            <div class="home-banner-content">
                                <div class="container">
                                    <h2 class="text-white py-3 mb-0">{{__($image->activity->currentML->name)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end loop item -->

            </div>

            <!-- start pagination -->
            <div class="row justify-content-center align-items-center pagination">
                <span class="mr-5"> {{($images->currentpage()-1) * $images->perpage() + 1}} -
                    {{$images->currentpage() * $images->perpage() > $images->total() ? $images->total() : $images->currentpage() * $images->perpage() }}
                    of  {{$images->total()}} </span>
                {{$images->links()}}
            </div>

            <!-- end pagination -->
        </div>
    </div>

@endsection
