<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $materials = Material::with('currentMl')->paginate(9);

        return view('materials', compact('materials'));
    }
}
