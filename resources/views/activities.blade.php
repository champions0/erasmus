@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="container">
            <div class="col-md-6 col-12 p-0 mt-5">
                <h1 class="page-title">{{__("Activities")}}</h1>
                <p class="page-desc py-3">{{__("In the framework of the project several trainings events, workshops and youth
                    exchanges are organized")}}</p>
            </div>
            <hr class="page-header-line">
            <div class="block-list px-3 py-4">

                <!-- start loop item -->
                @foreach($activities as $activity)
                    <div class="row item">
                        <div class="col-md-5 col-12 img-block">
                            @if($activity->isImage())
                                <img src="{{$activity->list_image}}" alt="" class="img-fluid w-100 h-100">
                            @else
                                <video class="img-fluid w-100 h-100">
                                    <source src="{{$activity->list_image}}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                        <div class="col-md-7 col-12 py-2">
                            <h3>{{$activity->currentMl->name}}</h3>
                            <p class="date">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.57072 0.25415C3.67895 0.25415 0.527466 3.41269 0.527466 7.30446C0.527466 11.1962 3.67895 14.3548 7.57072 14.3548C11.4695 14.3548 14.6281 11.1962 14.6281 7.30446C14.6281 3.41269 11.4695 0.25415 7.57072 0.25415ZM7.57777 12.9447C4.46154 12.9447 1.93753 10.4207 1.93753 7.30446C1.93753 4.18822 4.46154 1.66421 7.57777 1.66421C10.694 1.66421 13.218 4.18822 13.218 7.30446C13.218 10.4207 10.694 12.9447 7.57777 12.9447ZM7.42267 3.7793H7.38037C7.09835 3.7793 6.87274 4.00491 6.87274 4.28693V7.61467C6.87274 7.86143 6.99965 8.09409 7.21821 8.221L10.1441 9.97652C10.3838 10.1175 10.694 10.047 10.835 9.80732C10.9831 9.56761 10.9055 9.25034 10.6588 9.10934L7.93029 7.48777V4.28693C7.93029 4.00491 7.70468 3.7793 7.42267 3.7793Z" fill="#333333" fill-opacity="0.5"/>
                                </svg>
                                {{$activity->created_at->format('d.m.Y')}}
                            </p>
                            <p class="desc">{{$activity->currentMl->short_description}}</p>
                            <a href="{{route('activity.show', $activity->slug)}}">{{__("Read more")}} »</a>
                        </div>
                    </div>
                @endforeach
                <!-- end loop item -->

            </div>
            <!-- start pagination -->
            <div class="row justify-content-center align-items-center pagination">
                <span class="mr-5"> {{($activities->currentpage()-1) * $activities->perpage() + 1}} -
                    {{$activities->currentpage() * $activities->perpage() > $activities->total() ? $activities->total() : $activities->currentpage() * $activities->perpage() }}
                    of  {{$activities->total()}} </span>
                {{$activities->links()}}
            </div>
            <!-- end pagination -->
        </div>
    </div>
@endsection
