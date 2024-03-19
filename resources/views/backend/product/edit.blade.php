@extends('backend.master')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title h3">
                    Update Product
                </div>
            </div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name"><p class="h5">Catetgory name</p></label>
                            <select class="form-control" name="category_id" id="category_name">
                                <option selected disabled>Select A Category</option>
                                @foreach ( $categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategory_name"><p class="h5">Subatetgory name</p></label>
                            <select class="form-control" name="sub_category_id" id="subcategory_name">
                                <option selected disabled>Select A Subategory</option>
                                @foreach ( $subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $product->sub_category_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name"><p class="h5">Product Name</p></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Category name"/>
                        </div>

                        <div class="form-group">
                            <label for="buy_price"><p class="h5">Buy Price</p></label>
                            <input type="text" class="form-control" id="buy_price" name="buy_price" value="{{ $product->buy_price }}" placeholder="Buy Price"/>
                        </div>

                        <div class="form-group">
                            <label for="sale_price"><p class="h5">Sale Price</p></label>
                            <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price }}" placeholder="Sale Price"/>
                        </div>

                        <div class="form-group">
                            <label><p class="h5">Short Description</p></label>
                            <textarea class="form-control" name="short_description" rows="5">{{ $product->short_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label><p class="h5">Long Description</p></label>
                            <textarea class="form-control" name="long_description" id="summernote">{{ $product->long_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image"><p class="h5">Product Image</p></label>
                            <input type="file" class="form-control" id="image" name="image"/>
                            <img src="{{ asset('/product/'.$product->image) }}" height="50" width="50"/>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>

@endsection