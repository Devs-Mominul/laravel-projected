@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Color List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>color name</th>
                        <th>color code</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($color as $col)
                    <tr>
                        <td>{{ $col->color_name }}</td>
                        <td>
                            <i style="width:50px;height:50px;background-color:{{ $col->color_code }};">
                            @if($col->color_code==null)
                           <p class="text-danger"> {{ $col->color_name }}</p>
                            @else
                            <span style="color:transparent; background-color:{{ $col->color_code }};">{{ $col->color_name }}</span>
                            @endif

                           </i>
                    </td>
                    <td>
                        <a href="{{ route('color.remove',$col->id) }}" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Color List</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($catagories as $catagory)
                <div class="col-lg-6">
                   <div class="card">
                    <div class="card-header">{{ $catagory->catagory_name }}</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>size</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Size::where('catagory_id',$catagory->id)->get() as $sl)
                                <tr>

                                    <td>{{ $sl->size_name }}</td>
                                    <td><a href="{{ route('size.remove',$sl->id) }}" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>


                                </tr>

                                @endforeach

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
        <div class="card-header">Varition</div>
        <div class="card-body">
            <form action="{{ route('color.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Color Name</label>
                    <input type="text" name="color_name" id="color_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Color Code</label>
                    <input type="text" name="color_code" id="color_code" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
            <br><br>

        </div>

    </div>

</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Size</div>
        <div class="card-body">
            <form action="{{ route('size.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="">Size Name</label>
                    <select name="catagory_id" id="catagory_id" class="form-control">

                        <option value="">select option</option>
                        @foreach ($catagories as $catagory)
                        <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>

                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="">Size Name</label>
                    <input type="text" name="size_name" id="size_name" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
            <br><br>

        </div>

    </div>
</div>

@endsection
