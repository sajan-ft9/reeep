@extends('backend.layout')
@section('content')
    <div class="container">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->image_path }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">Admin</p>
                <hr>
                <div>
                    <div class="text-center">

                        <h4>Profile Update</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('backend.admin.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image_path" class="form-control" onchange="loadFile(event)"
                                        id="">
                                    <img class="mt-2" id="output" alt="">
                                    @error('image_path')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route('backend.admin.passwordUpdate',$user->id) }}" method="POST">

                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="">
                                    @error('old_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" id="">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password Confirmation</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="">
                                </div>
                               
                                <button class="btn btn-primary" type="submit">Update Password</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.height = "100"
            output.width = "100"
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
