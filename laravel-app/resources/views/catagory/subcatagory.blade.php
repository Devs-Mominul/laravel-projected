@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card bg-info">
        <div class="card-header">Catagory List</div>
        <div class="card-body">
           <div class="row">
            @foreach ($catagories as $catagory)
            <div class="col-lg-6">
               <div class="card">
                   <div class="card-header">{{ $catagory->catagory_name }}</div>
                   <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>catagory name</th>
                                   <th>action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach (App\models\AshaMoni::where('catagory_id',$catagory->id)->get() as $subcatagory )


                            <tr>
                                <td>{{ $subcatagory->subcatagory_name }}</td>
                                <td>
                                 <div class="d-flex">
                                    <a href="{{ route('subcatagory.edited',$subcatagory->id) }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('subcatagory.delete',$subcatagory->id) }}"" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>


                                </td>
                            </tr> @endforeach


                           </tbody>

                       </table>
                   </div>
               </div>
           </div>



           @endforeach

           </div>
        </div>
    </div>

</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Subcatagory Edit</div>
        <div class="card-body">
            <form action="{{ route('subcatagory_post') }}" method="Post">
                @csrf
                <div class="mb-3">
                    <select name="catagory" id="catagory" class="form-control">
                        <option value="id">select catagory</option>
                        @foreach ($catagories as $catagory )

                        <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subcatagory_name">Subcatagory Name</label>
                    <input type="text" name="subcatagory_name" id="subcatagory_name" class="form-control" value="{{ $catagory->catagory_name }}">
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
