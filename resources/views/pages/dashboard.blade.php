@extends('layouts.app') 
@section('content')


<div class="card">
    <div class="card-header h4">Dashboard</div>

    <div class="card-body">

        <div class="user-info mb-3">
            <div class="media">
                <img class=" align-self-start mr-5" src='{{asset($user->profile->avatar)}}' width="150px" alt="{{$user->name}}">
                <div class="media-body">
                    <h1 class="mt-0 h1">{{$user->name}}</h1>
                    <div class="row">
                     {!!$user->profile->about!!}

                    <span class="facebook"><a href="{{$user->profile->facebook}}"><i class="fab fa-facebook"></i></a></span>
                    <span class="youtube"><a href="{{$user->profile->youtube}}"><i class="fab fa-youtube"></i></a></span>

                    <span class="linkedin">  <a href="{{$user->profile->linkedin}}"><i class="fab fa-linkedin"></i></a></span>
                   

                    </div>
                    <a href="{{route('profile.edit')}}" class="btn btn-success mb-3" style="float:right">update Profile</a>
                </div>
            </div></div>

            <div class="dashboard row mb-5">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header alert-success">
                            Users
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{$user_count}} </h1>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header alert-danger">
                            Posts
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{$post_count}} </h1>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header alert-info">
                            Tags
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{$tag_count}} </h1>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <div class="card-header alert-warning">
                            Categories
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{$category_count}} </h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="setting">
                @if(Auth::user()->admin)
                <div class="form-group row">
                    <label class="col-3">Site Name</label>
                    <span>:&nbsp;{{$setting->site_name}}</span>
                </div>
                <div class="form-group row">
                    <label class="col-3">Contact Number</label>
                    <span>:&nbsp;{{$setting->contact_number}}</span>
                </div>
                <div class="form-group row">
                    <label class="col-3">Contact E-mail</label>
                    <span>:&nbsp;{{$setting->contact_email}}</span>
                </div>
                <div class="form-group row">
                    <label class="col-3">Address</label>
                    <span>:&nbsp;{{$setting->address}}</span>
                </div>
                <a href="{{route('setting.edit')}}" class="btn btn-success mb-3">update Site Settings</a> @endif

               

            </div>
        </div>
    </div>
@endsection