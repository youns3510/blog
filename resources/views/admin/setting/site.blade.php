@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header h4">Update Settings</div>
        <div class="card-body">

            @include('errors')

            <form method="Post" action="{{route('setting.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" class="form-control" id="site_name"  name="site_name" value="{{$setting->site_name}}">

                </div>
                       
                <div class="form-group">
                     <label for="contact_number">Contact Number</label>
                     <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{$setting->contact_number}}">
                 </div>
                <div class="form-group">
                    <label for="contact_email">Contact E-mail</label>
                    <input type="email" class="form-control" id="contact_email"  name="contact_email" value="{{$setting->contact_email}}">
                </div>
                <div class="form-group">
                     <label for="address">Address</label>
                     <input type="text" class="form-control" id="address"  name="address" value="{{$setting->address}}">
                 </div>
                <button type="submit" class="btn btn-success btn-block">update</button>

            </form>
        </div>
    </div>

@endsection

