<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function index(Request $request)
    {
        $carModels = CarModel::with('brand')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', "%$name%");
            })
            ->when($request->input('brand_id'), function ($query, $brandId) {
                $query->where('brand_id', $brandId);
            })
            ->when($request->input('manufacturing_year'), function ($query, $year) {
                $query->where('manufacturing_year', $year);
            })
            ->orderBy('id', 'desc')
            ->get();

        $brands = Brand::all();

        return view('car_models.index', compact('carModels', 'brands'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('car_models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'manufacturing_year' => 'required|integer|min:1886|max:' . date('Y'),
        ]);

        $imagePath = $request->file('image')->store('car_images', 'public');

        CarModel::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'image' => $imagePath,
            'manufacturing_year' => $request->manufacturing_year,
        ]);

        return redirect()->route('car-models.index');
    }

    public function edit(String $id)
    {
        $brands = Brand::all();
        $carModel = CarModel::find($id);
        return view('car_models.edit', compact('carModel', 'brands'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'manufacturing_year' => 'required|integer|min:1886|max:' . date('Y'),
        ]);
        $carModel = CarModel::find($id);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
            $carModel->image = $imagePath;
        }

        $carModel->brand_id = $request->brand_id;
        $carModel->name = $request->name;
        $carModel->manufacturing_year = $request->manufacturing_year;
        $carModel->save();
        return redirect()->route('car-models.index');
    }
    public function destroy(string $id)
    {
        $carmodel = CarModel::find($id);
        $carmodel->delete();
        return redirect()->route('car-models.index');
    }
}
