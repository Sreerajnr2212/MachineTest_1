@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>Edit Brand</h3>
        <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}" required>
            </div>
            <div class="form-group">
                <label for="logo">Brand Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
                @if($brand->logo)
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" width="100" class="mt-3">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
    </div>
@endsection
