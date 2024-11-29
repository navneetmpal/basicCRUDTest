@extends('layout.app')
@section('content')
    <div class="row mt-3" style="margin-left: 204px">
        <div class="col-md-8">
            <h4 class="mb-3">
                <span class="d-block p-2 bg-primary text-white">Update user</span>
            </h4>
            @include('common.messages')
            <form id="editform" method="post" action="{{ route('update', $data->id) }}" class="shadow-lg p-3 mb-5 bg-body rounded border border-3">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$data->email}}">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" name="contact" id="contact" value="{{$data->number}}">
                </div>
                <div class="form-group">
                    <label for="lang">Select which language you know</label>
                    <div id="langError"></div>
                    {{-- Hindi --}}
                    <input type="checkbox" id="lang" name="lang[]" value="1" {{ in_array(1, $result) ? 'checked' : '' }}>
                    <label for="hindi">Hindi</label>
                    <br> {{-- English --}}
                    <input type="checkbox" name="lang[]" value="2" {{ in_array(2, $result) ? 'checked' : '' }}>
                    <label for="english">English</label>
                    <br> {{-- Gujarati --}}
                    <input type="checkbox" name="lang[]" value="3" {{ in_array(3, $result) ? 'checked' : '' }}>
                    <label for="gujarati">Gujarati</label>
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