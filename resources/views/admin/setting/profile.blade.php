@extends('layouts.app') 
@section('content')
<div class="card">
   <div class="card-header h4">Update Settings</div>
   <div class="card-body profile">
   @include('errors')

      <form method="Post" action="{{route('profile.update')}}" enctype="multipart/form-data">
         {{ csrf_field() }}
         
<h4>Name</h4>
         <div class="form-group name">         
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
         </div>
<h4>Avatar</h4>
         <div class="form-group avatar">     
            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
         </div>
         <h4>About</h4>
         <div class="form-group name">         
            <textarea id="summernote" name="about">{{$user->profile->about}}</textarea>
         </div>
         <h4>Facebook</h4>
         <div class="form-group name">         
            <input type="url" class="form-control" id="facebook" name="facebook" value="{{$user->profile->facebook}}">
         </div>
         <h4>Youtube</h4>
         <div class="form-group name">         
            <input type="url" class="form-control" id="youtube" name="youtube" value="{{$user->profile->youtube}}">
         </div>
         <h4>Linkedin</h4>
         <div class="form-group name">         
            <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{$user->profile->linkedin}}">
         </div>
         <h4>E-mail</h4>
         <div class="form-group email">         
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
         </div>
         <h4>Update Password</h4>
         <div class="password">
            <div class="form-group">
               <label> Old Password</label>
               <input type="password" class="form-control"  name="old_password" placeholder="Enter Old Password">
            </div>
            <div class="form-group">
               <label>New Password</label>
               <input type="password" class="form-control" name="password" placeholder="Enter New Password">
            </div>
            <div class="form-group">
               <label>Confirm New Password</label>
               <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            </div>
         </div>

         <button type="submit" class="btn btn-success btn-block">update</button>

      </form>
   </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}"/>
<link rel="stylesheet" href="{{asset('css/summernote-bs4.css')}}"/>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/bootstrap-multiselect.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/summernote-bs4.js')}}"></script>
<script>

$(document).ready(function() {
    $('#summernote').summernote({
       toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
    });
  });
</script>
@endsection

