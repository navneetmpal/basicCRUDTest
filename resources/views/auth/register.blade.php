@extends('layout.app')
@section('content')
    <div class="row mt-3 mb-3" style="margin-left: 204px">
        <div class="col-md-8">
            <h4 class="mb-3"><span class="d-block p-2 bg-primary text-white">User registration</span></h4> 
            @include('common.messages')
            <form id="form" method="post" action="{{ route('finalSubmit') }}" class="shadow-lg p-3 bg-body rounded">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" name="contact" id="contact">
                </div>
                <div class="form-group">
                    <label for="lang">Select which lauguage you know</label>
                    <div id="langError"></div>
                    
                    <input type="checkbox" id="lang" name="lang[]" value="1">
                    <label for="lang">Hindi</label>
                    <br>
                    <input type="checkbox" name="lang[]" value="2">
                    <label for="lang">English</label>
                    <br>
                    <input type="checkbox" name="lang[]" value="3">
                    <label for="lang">Gujrati</label>
                    <br>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <input type="submit" class="btn btn-danger" value="Submit" />
                <a href="{{route('index')}}" class="btn btn-primary">Back</a>
            </form>
            <div class="d-flex justify-content-end pe-2">
                Allready costumer ? <a href="{{route('login')}}"> Login</a>
            </div>
        </div>
    </div>

    @section('content-js')
    <script type="text/javascript" src="{{asset('assets/js/costume.js')}}"></script>
    @endsection
@endsection