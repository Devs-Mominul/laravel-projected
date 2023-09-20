@extends('layouts.admin')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Subcatagory Edit </div>
        <div class="card-body">
            <form action="{{ route('subcatagory.updated',$subcatagory->id) }}" method="Post">
                @csrf
                <div class="mb-3">
                    <select name="catagory" id="catagory" class="form-control" >
                        <option value="id">select catagory</option>
                        @foreach ($catagories as $catagory )

                        <option value="{{ $catagory->id }}"  {{ $catagory->id==$subcatagory->catagory_id?'selected':'' }} >{{ $catagory->catagory_name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subcatagory_name">Subcatagory Name</label>
                    <input type="text" name="subcatagory_name" id="subcatagory_name" class="form-control" value="{{ $subcatagory->subcatagory_name }}">
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div
@endsection
