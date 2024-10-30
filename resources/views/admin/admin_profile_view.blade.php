@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-6">
        <h5 class="card-title fw-semibold mb-4">User Profile</h5>
        <div class="card"><br><br>
            <center>
                <img src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/user.jpg') }}" class="rounded-circle" width="225" height="225" alt="...">
            </center>
            <div class="card-body">
                <h5 class="card-title">Name : {{ $adminData->name }}</h5>
                <hr>
                <h5 class="card-title">User Email : {{ $adminData->email }}</h5>
                <hr>
                <h5 class="card-title">User Name : {{ $adminData->username }}</h5>
                <hr>
                <center>
                    <a href="{{ route('edit.profile') }}" class="btn btn-outline-info m-1">Edit Profile</a>
                </center>
            </div>
        </div>
    </div>
</div>

@endsection