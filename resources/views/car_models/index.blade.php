@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>Car Models</h3>
        <a href="{{ route('car-models.create') }}" class="btn btn-primary">Add Car Model</a>
        <form method="GET" action="{{ route('car-models.index') }}" class="mt-3">
            <div class="form-row">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Model Name" value="{{ request('name') }}">
                </div>
                <div class="col">
                    <select name="brand_id" class="form-control">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" name="manufacturing_year" class="form-control" placeholder="Year" value="{{ request('manufacturing_year') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Manufacturing Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carModels as $carModel)
                    <tr>
                        <td>{{ $carModel->brand->name }}</td>
                        <td>{{ $carModel->name }}</td>
                        <td>@if($carModel->image)
                            <img src="{{ asset('storage/' . $carModel->image) }}" alt="{{ $carModel->name }}" width="50">
                        @endif</td>
                        <td>{{ $carModel->manufacturing_year }}</td>
                        <td>
                            <a href="{{ route('car-models.edit', $carModel) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('car-models.destroy', $carModel) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this Brand?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
