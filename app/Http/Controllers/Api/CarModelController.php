<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'manufacturing_year' => 'required|integer|min:1886|max:' . date('Y'),
        ]);

        $carModel = CarModel::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'manufacturing_year' => $request->manufacturing_year,
        ]);

        return response()->json(['msg' => 'Car Model Created Successfully'], 201);
    }
}
