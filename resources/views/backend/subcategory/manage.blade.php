@extends('backend.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header h3">
                <i class="fas fa-table me-1"></i>
                Subcategory Table
            </div>
            <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-primary">{{ session()->get('success') }}</div>
            @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->slug }}</td>
                            <td>
                            <a href="{{ url('/subcategory/edit/'.$subcategory->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ url('/subcategory/delete/'.$subcategory->id) }}" class="btn btn-sm btn-danger">Delete</a>
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