@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>Brands</h3>
        <a href="{{ route('brands.create') }}" class="btn btn-primary">Add Brand</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td>@if($brand->logo)
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" width="50">
                        @endif</td>
                        <td>
                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this car model?');">
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
