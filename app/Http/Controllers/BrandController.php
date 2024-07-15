<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('logo')) {
          $logoPath = $request->file('logo')->store('logos', 'public');
        }else{
            $logoPath = null;
        }

        Brand::create([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()->route('brands.index');
    }

    public function edit(String $id)
    {
        $brand = Brand::find($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, String $id)
    {
        $brand = Brand::find($id);
        $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $brand->logo = $logoPath;
        }

        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brands.index');
    }

    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.index');
    }
    public function logos()
    {
        $brands = Brand::orderBy('name')->get();
        return view('brands.logos', compact('brands'));
    }
    public function search(Request $request)
    {
        $query = $request->input('search');
        $brands = Brand::where('name', 'LIKE', '%' . $query . '%')
                        ->orderBy('name')
                        ->get();

        return view('brands.logos', compact('brands'));
    }
    public function searchByAlphabetic(string $search)
    {
        $brands = Brand::where('name', 'LIKE', $search . '%')
        ->orderBy('name')
        ->get();
        return view('brands.logos', compact('brands'));
    }
}

