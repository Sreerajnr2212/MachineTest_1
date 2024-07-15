@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>Add Brand</h3>
        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="logo">Brand Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
            <button type="submit" class="btn btn-primary">Add Brand</button>
        </form>
    </div>
@endsection
