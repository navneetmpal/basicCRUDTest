@extends('layout.app')
@section('content')
    <div class="row mt-3" style="margin-left: 204px">
        <div class="col-md-8">
            <h4 class="mb-3"><span class="d-block p-2 bg-primary text-white">User login</span></h4> 
            @include('common.messages')
            <form id="form" method="post" action="{{ route('login') }}" class="shadow-lg p-3 mb-5 bg-body rounded">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <input type="submit" class="btn btn-danger" value="Submit" />
                <a href="{{route('index')}}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>

    @section('content-js')
    <script type="text/javascript" src="{{asset('assets/js/costume.js')}}"></script>
    @endsection
@endsection