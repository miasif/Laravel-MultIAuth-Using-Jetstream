@extends('user.user_master')
@section('user')

<div class="row" style="padding: 20px">
    <div class="col-md-6">
        <h4>Change Password</h4>
        <form method="post" action="{{route('password_update')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Current Password</label>
                <input type="password" id="current_password" class="form-control" name="oldPassword">

              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"> New Password</label>
              <input type="password" id="password" class="form-control" name="password">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">

              </div>





            <button type="submit" class="btn btn-primary">Update</button>
          </form>


    </div>

</div>

@endsection
