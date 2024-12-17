@extends('layout.app')
@section('content')
    <div class="row m-2">
        <div class="col-2">
            <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
        </div>
        <div class="col-8">
            <h3><span class="d-block p-1 bg-primary text-white">User listing</span></h3>
        </div>
        <div class="col-2 d-flex justify-content-end">
            <a href="{{route('register')}}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <form class="d-flex" action="{{route('search')}}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search user..." name="name" id="name">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </nav>

    @include('common.messages')
    <table class="table table-striped table-bordered shadow-lg p-3 mb-5 bg-body rounded">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">number</th>
                <th scope="col">Language</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <th scope="row">{{$d->id}}</th>
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->number}}</td>
                <td>
                    @foreach($d->userlang as $lang) @if($lang->lang=='1') Hindi
                    <br> @endif @if($lang->lang=='2') English
                    <br> @endif @if($lang->lang=='3') Gujrati
                    <br> @endif @endforeach
                </td>
                <td>
                    <a href="{{route('edit', $d->id)}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
    
@endsection