@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Catagory List</div>
        <div class="card-body">
            <table class="table table-bordered">
               <thead>
               <tr>

                <th>sl</th>
                <th>brand name</th>
                <th>brand logo</th>
                <th>action</th>
               </tr>


               </thead>
               <tbody>
                @foreach ($catagories as $catagory)
                 <tr>
                    <td>{{ $catagory->id }}</td>
                    <td>{{ $catagory->brand_name }}</td>
                    <td>
                        <img src="{{ asset('uploads/brand/') }}/{{ $catagory->brand_logo }}" alt="" width="80">
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('brandpreview_post.getten') }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('brandpreview_post.delete',$catagory->id) }}" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </div>

                    </td>



                </tr>



                @endforeach

               </tbody>


            </table>




           </div>
        </div>
    </div>

</div>

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Brand Profile</div>
        <div class="card-body">
            <form action="" method="Post" enctype="multipart/form-data">
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
