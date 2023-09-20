@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
   <form method="Post" action="{{ route('delete.cheak') }}">
    @csrf
    <div class="card">
        <div class="card-header">User List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th class="">
                            <div class="mx-2 custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkAll">
                                <label class="custom-control-label" for="checkAll">checkAll</label>
                            </div>
                        </th>

                      <th>sl</th>

                      <th>Catagory Name</th>
                      <th>Catagory Image</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($catagories as $users)
                   <tr>
                    <td>
                        <div class="mx-2 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cate{{ $users->id }}" name="catagory_id[]" value="{{ $users->id }}">
                            <label class="custom-control-label" for="cate{{ $users->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $users->id }}</td>

                    <td>{{ $users->catagory_name }}</td>

                    <td>
                        @if($users->catagory_image==null)
                        <img src="{{ Avatar::create($users->catagory_name)->toBase64() }}"  width="70" />
                        @else
                        <img src="{{ asset('uploads/catagory/') }}/{{ $users->catagory_image }}" alt="" class="" width="80">
                        @endif
                    </td>

                    <td>
                        <div class="d-flex">
                            <a href="{{ route('catagory.find',$users->id) }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('catagory.finding.delete',$users->id) }}" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>

                   </tr>

                   @endforeach

                </tbody>

            </table>
            <button type="submit" class="btn btn-danger">Delete All</button>
        </div>
    </div>
   </form>
</div>
<div class="col-lg-4">
    <form action="{{ route('catagory.update') }}" method="Post" enctype="multipart/form-data">
        @csrf
       <div class="mb-3">
        <label for="catagory_name">catagory name</label>
        <input type="text" name="catagory_name" id="catagory_name" class="form-control" value="" >
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
@endsection
@section('footer_script')
<script>
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>


@endsection
