@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Inventory List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventory as $inven)
                    <tr>
                        <td>{{ $inven->rel_to_color->color_name}}</td>
                        <td>{{ $inven->rel_to_size->size_name}}</td>
                        <td>{{ $inven->quantity }}</td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Inventory List</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('inventory.store',$product->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="label-form">Product</label>
                    <input type="text" name="product" id="" class="form-control"value={{ $product->product_name }}>
                </div>
                <div class="mb-3">
                    <label for="">Color Name</label>
                    <select name="color_id" id="" class="form-control">
                        <option value="">select color</option>
                        @foreach($color as $col)
                        <option value="{{ $col->id }}">{{ $col->color_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Size</label>
                    <select name="size_id" id="" class="form-control">
                        <option value="">select color</option>
                        @foreach(App\Models\Size::where('catagory_id',$product->catagory)->get() as $sl)
                        <option value="{{ $sl->id }}">{{ $sl->size_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
