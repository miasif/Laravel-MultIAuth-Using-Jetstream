@extends('user.user_master')
@section('user')


<div class="row" style="padding: 20px">
    <div class="col-md-6">

<div class="card" style="width: 18rem;">
    <img src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}"  style="width:150px; height:150px; class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">User Name: {{$user->name}}</h5>
      <p class="card-text"> User Email:{{$user->email}}</p>
      <a href="{{route('profile_edit')}}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>
@endsection
