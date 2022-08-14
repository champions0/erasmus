@extends('dashboard.layouts.app')
@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4 class="page__title"><i class="far fa-file-alt" aria-hidden="true"></i> <span class="font-weight-semibold">{{__('Create Partner')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Create Partner')}}</h5>
            </div>

            <div class="card-body">
                {!! Form::open(['route' => "dashboard.partners.store", 'files' => true]) !!}
                @include('dashboard.partners._form')
                <div class="text-right">
                    <button type="submit" class="btn btn-primary custom-btn legitRipple">{{__('Add')}}<i class="icon-floppy-disk ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
