@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>Add Car Model</h3>
        <form action="{{ route('car-models.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" id="brand_id" name="brand_id" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Model Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="image">Model Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="manufacturing_year">Manufacturing Year</label>
                <input type="number" class="form-control" id="manufacturing_year" name="manufacturing_year" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Car Model</button>
        </form>
    </div>
@endsection
