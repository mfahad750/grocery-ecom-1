@extends('backend.master')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title h3">
                    Add New Subcategory
                </div>
            </div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <form action="{{ route('subcategory.store') }}" method="post">
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
                            <label for="name"><p class="h5">Subcategory Name</p></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Category name"/>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Save</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>

@endsection