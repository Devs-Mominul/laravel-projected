@extends('layouts.admin')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Profile Update</div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post">
                @if (session('success'))
                <strong class="text-info">  {{ session('success') }}</strong>

                @endif
                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="">
                    @error('name')
                   <strong class="text-danger">{{ $message }}</strong>

                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong>

                     @enderror
                </div>
                <div class="mb-2">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div><div class="col-lg-4">
    <div class="card">
        <div class="card-header">Profile Update</div>
        <div class="card-body">
            <form action="{{ route('password.update') }}" method="post">
                @if (session('success'))
                <strong class="text-info">  {{ session('success') }}</strong>

                @endif
                @csrf
                @if(session('msg'))
                <strong class="text-success">{{ session('msg') }}</strong>
                @endif
                <div class="mb-3">
                    <label for="Current_password">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" value="">
                    @error('current_password')
                   <strong class="text-danger">{{ $message }}</strong>

                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <strong class="text-danger">{{ $message }}</strong>

                     @enderror
                </div>
                <div class="mb-3">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <strong class="text-danger">{{ $message }}</strong>

                     @enderror
                </div>


                <div class="mb-2">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Image Upload</div>
        <div class="card-body">
            <form action="{{ route('upload.image') }}" method="post" enctype="multipart/form-data" >
             @if (session('photos'))
             <strong class="text-info">  {{ session('photos') }}</strong>

             @endif
                @csrf
                <div class="mb-3">
                    <label for="image">Uploads</label>
                    <input type="file" name="photo" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="mb-2">
                    <img id="blah"  width="100"  />
                </div>

                <div class="mb-2">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
