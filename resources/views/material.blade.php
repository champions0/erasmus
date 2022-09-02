@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="container materials">
            <img src="{{$materialMl->image}}" alt="" class="img-fluid w-100 h-100">
            <div class="row block-list materials">
                <div class="col-md-8 col-12 project-page py-4 materials">
                    <div class="item p-4">
                        <h3>{{$material->currentMl->name}}</h3>
                        <p class="desc">{{$material->currentMl->text}}</p>

                        <a href="{{$materialMl->file_path}}" download="">{{__("Download File")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
