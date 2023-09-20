@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Product List
            <a href="{{ route('list.product') }}" class=" btn btn-primary">Product List</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>catagory</th>
                        <th>subcatagory</th>
                        <th>brand</th>
                        <th>product name</th>
                        <th>price</th>
                        <th>Discount</th>
                        <th>after discount</th>
                        <th>preview</th>
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>
                   @foreach ( $prod as $product )
                   <tr>
                    <td>{{ $product->catagory }}</td>
                    <td>{{ $product->subcatagory_id }}</td>
                    <td>{{ $product->brand_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->after_discount }}</td>
                    <td><img src="{{ asset('uploads/product/') }}/{{ $product->preview }}" alt="" width="80"></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('inventory',$product->id) }}" class="mr-1 shadow btn btn-success btn-xs sharp"><i class="fa fa-archive"></i></a>
                            <a href="{{ route('product.show',$product->id) }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('product.delete',$product->id) }}" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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
