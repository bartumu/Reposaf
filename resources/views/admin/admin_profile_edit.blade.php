@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>

<div class="row">
    <div class="col-md-6">
        <h5 class="card-title fw-semibold mb-4">Edit Profile</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="{{ $editData->name }}" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="{{ $editData->email }}" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">User Name</label>
                        <input type="text" value="{{ $editData->username }}" name="username" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Profile Image</label>
                        <input type="file" value="{{ $editData->profile_image }}" name="profile_image" class="form-control" id="profile_image">
                    </div>
                    <center>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <img id="showProfile_image" src="{{ (!empty($editData->profile_image)) ? url('upload/admin_images/'.$editData->profile_image) : url('upload/user.jpg') }}" class="rounded" width="125" height="125" alt="...">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-info m-1">Update Profile</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#profile_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showProfile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

@endsection