<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialMl;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $materials = Material::with('currentMl')->ordered()->paginate(9);

        return view('materials', compact('materials'));
    }

    /**
     * @return View
     */
    public function show(Material $material, Request $request): View
    {
        $materialMl = $material->mls()->where($request->only('lng_code'))->first();

        return view('material', compact('material', 'materialMl'));
    }
}
