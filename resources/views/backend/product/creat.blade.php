@extends('backend.master')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title h3">
                    Add New Product
                </div>
            </div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name"><p class="h5">Catetgory name</p></label>
                            <select class="form-control" name="category_id" id="category_name">
                                <option selected disabled>Select A Category</option>
                                @foreach ( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategory_name"><p class="h5">Subatetgory name</p></label>
                            <select class="form-control" name="sub_category_id" id="subcategory_name">
                                <option selected disabled>Select A Subategory</option>
                                @foreach ( $subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name"><p class="h5">Product Name</p></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Category name"/>
                        </div>

                        <div class="form-group">
                            <label for="buy_price"><p class="h5">Buy Price</p></label>
                            <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="Buy Price"/>
                        </div>

                        <div class="form-group">
                            <label for="sale_price"><p class="h5">Sale Price</p></label>
                            <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Sale Price"/>
                        </div>

                        <div class="form-group">
                            <label><p class="h5">Short Description</p></label>
                            <textarea class="form-control" name="short_description" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label><p class="h5">Long Description</p></label>
                            <textarea class="form-control" name="long_description" id="summernote"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image"><p class="h5">Product Image</p></label>
                            <input type="file" class="form-control" id="image" name="image"/>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Save</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>

@endsection