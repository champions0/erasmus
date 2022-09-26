@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="container">
            <div class="col-md-6 col-12 p-0 mt-5">
                <h1 class="page-title">{{__("Materials")}}</h1>
                <p class="page-desc py-3">{{__("Choose language and download materials, reports, presentations and much more.")}}</p>
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
                                @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key => $value)
                                    <span class="@if($loop->first) active @endif material_language_item"  @if($loop->index > 2) style="display: none" @endif
                                    data-material_id="{{$material->id}}" data-lang="{{$key}}">{{$value['displayName']}}</span>
                                    @if($loop->index == 2)
                                        <span class="plus_span" style="padding: 6px">+4</span>
                                    @endif
                                @endforeach
                            </div>
                            <a href="{{route('materials.show', ['material' => $material->id, 'lng_code' => 'en'])}}">{{__("Download File")}}</a>
                        </div>
                    </div>
                @endforeach
                <!-- end loop item -->

            </div>

            <!-- start pagination -->
            <div class="row justify-content-center align-items-center pagination">
                <span class="mr-5"> {{($materials->currentpage()-1) * $materials->perpage() + 1}} -
                    {{$materials->currentpage() * $materials->perpage() > $materials->total() ? $materials->total() : $materials->currentpage() * $materials->perpage() }}
                    of  {{$materials->total()}} </span>
                    {{$materials->links()}}
            </div>

            <!-- end pagination -->
        </div>
    </div>

@endsection
