<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::whereNull('deleted_at')->get();
        return response()->json(['brands' => $brands], 200);
    }

    public function show($id)
    {
        $brand = Brand::with('carModels')->findOrFail($id);
        return response()->json(['brand' => $brand], 200);
    }
}
