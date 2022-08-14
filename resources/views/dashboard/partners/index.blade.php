@extends('dashboard.layouts.app')
@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4 class="page__title"><i class="far fa-file-alt" aria-hidden="true"></i> <span class="font-weight-semibold">Partner</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <a href="{{route('dashboard.partners.create')}}" class="btn custom-btn btn-labeled btn-labeled-right bg-primary">Add New
                    <b><i class="icon-plus2"></i></b></a>
            </div>
        </div>
    </div>

    <div class="content pt-0">

        <div class="card">
            <div class="card-body">
                @include('flash::message')
            </div>

            <div class="table-responsive">
                <table class="table my-table">
                    <thead class="table__thead">
                    <tr>
                        <th>Name</th>
                        <th>Text</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table__tbody">
                    @foreach($partners as $partner)
                        <tr class="table__item">
                            <td>{{$partner->currentMl->name}}</td>
                            <td>{{$partner->currentMl->text}}</td>
                            <td>
                                <div class="list-icons">
                                    <a href="{{route('dashboard.partners.edit', $partner->id)}}"
                                       class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
                                    <a href="#" class="list-icons-item text-danger-600"><i class="icon-trash"
                                       onclick="$('#partner-delete-{{$partner->id}}').submit()"></i></a>
                                    <form action="{{route('dashboard.partners.destroy', $partner->id)}}"
                                          onsubmit="return confirm('Are You Sure?');" method="POST"
                                          id="partner-delete-{{$partner->id}}">
                                        @csrf
                                        {!! method_field('DELETE') !!}
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$partners->links()}}
            </div>
        </div>
    </div>
@endsection
