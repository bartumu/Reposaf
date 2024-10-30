@extends('admin.admin_master')
@section('admin')


<div class="row">
    <div class="col-md-6">
        <h5 class="card-title fw-semibold mb-4">Change Password Admin</h5>
        <div class="card">
            <div class="card-body">

            @if(count($errors))
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
                <form method="POST" action="{{ route('update.password') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="oldpassword" class="form-control" id="oldpassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="newpassword" class="form-control" id="newpassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                    </div>
                    <center>
                        <br>
                        <button type="submit" class="btn btn-outline-info m-1">Change Password</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection