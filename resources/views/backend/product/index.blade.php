@extends('backend.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header h3">
                <i class="fas fa-table me-1"></i>
                Product Table
            </div>
            <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-primary">{{ session()->get('success') }}</div>
            @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Product Price</th>
                            <th>Category/Subcategory</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($products as $product )
                           <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <img src="{{ asset('/product/'.$product->image) }}" height="50" width="50" /><br/>
                                <strong>Name: {{ $product->name }}</strong><br/>
                            </td>
                            <td>
                                <strong>Buy Price : {{ $product->buy_price }}</strong><br/>
                                <strong>Sale Price : {{ $product->sale_price }}</strong><br/>
                            </td>
                            <td>
                            <strong>Category name : {{ $product->category->name }}</strong><br/>
                            <strong>Subcategory name : {{ $product->subcategory?->name }}</strong><br/>
                            </td>
                            <td>
                                <a href="{{ url('/admin/product/edit/'. $product->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('/admin/product/delete/'. $product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection