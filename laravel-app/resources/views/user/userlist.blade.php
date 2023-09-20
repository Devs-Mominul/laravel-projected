@extends('layouts.admin')
@section('content')
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">User List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>sl</th>
                      <th>photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($user as $users)
                   <tr>
                    <td>{{ $users->id }}</td>
                    <td>
                        @if($users->photo==null)
                        <img src="{{ Avatar::create($users->name)->toBase64() }}"  width="70" />
                        @else
                        <img src="{{ asset('uploads/user/') }}/{{ $users->photo }}" alt="" class="" width="80">
                        @endif
                    </td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('user.remove',$users->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>

                   </tr>

                   @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
