@extends('layouts.admin')
@section('content')

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Edit Profile</div>
        <div class="card-body">
            <form action="{{ route('catagory.finding') }}" method="Post" enctype="multipart/form-data">
                @csrf
               <div class="mb-3">



                <label for="catagory_name">Edit Catagory</label>
                <input type="hidden" name="catagory_id" id="catagory_name" class="form-control" class="form-control" value="{{ $catagory_info->id }}" >
                <input type="text" name="catagory_name" id="catagory_name" class="form-control" class="form-control" value="{{ $catagory_info->catagory_name }}">
               </div>
               <div class="mb-3">
                <label for="catagory_image">catagory image</label>
                <input type="file" name="catagory_image" id="catagory_image" class="form-control">
               </div>
               <div class="mb-2">
                <input type="submit" value="Update" class="btn btn-primary" >
               </div>
            </form>
        </div>
    </div>
</div>
@endsection
