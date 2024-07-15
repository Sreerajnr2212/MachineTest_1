@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>Edit Car Model</h3>
        <form action="{{ route('car-models.update', $carModel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" id="brand_id" name="brand_id" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $carModel->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Model Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $carModel->name }}" required>
            </div>
            <div class="form-group">
                <label for="image">Model Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($carModel->image)
                    <img src="{{ asset('storage/' . $carModel->image) }}" alt="{{ $carModel->name }}" width="100" class="mt-3">
                @endif
            </div>
            <div class="form-group">
                <label for="manufacturing_year">Manufacturing Year</label>
                <input type="number" class="form-control" id="manufacturing_year" name="manufacturing_year" value="{{ $carModel->manufacturing_year }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Car Model</button>
        </form>
    </div>
@endsection
