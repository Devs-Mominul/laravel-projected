@extends('layouts.admin')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Brand Profile</div>
        <div class="card-body">
            @foreach ($brand as $brand_catagory)


            @endforeach
            <form action="{{ route('brandpreview_post.post',$brand_catagory->id) }}" method="Post" enctype="multipart/form-data">
                @csrf
               <div class="mb-3">



                <label for="catagory_name">Edit Catagory</label>
          
                <input type="hidden" name="catagory_id" id="catagory_name" class="form-control" class="form-control" value="" >
                <input type="text" name="brand_name" id="catagory_name" class="form-control" class="form-control" value="">
               </div>
               <div class="mb-3">
                <label for="catagory_image">catagory image</label>
                <input type="file" name="brand_logo" id="catagory_image" class="form-control">
               </div>
               <div class="mb-2">
                <input type="submit" value="Update" class="btn btn-primary" >
               </div>
            </form>
        </div>
    </div>
</div>

@endsection
