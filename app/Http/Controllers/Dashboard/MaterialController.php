<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $materials = Material::latest()->paginate(20);
        return view('dashboard.materials.index', compact('materials'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.materials.create');
    }

    /**
     * @param MaterialRequest $request
     * @return RedirectResponse
     */
    public function store(MaterialRequest $request): RedirectResponse
    {
        Material::saveData($request->validated());

        flash()->success('Material Added');
        return redirect()->route('dashboard.materials.index');
    }

    /**
     * @param Material $material
     * @return View
     */
    public function edit(Material $material): View
    {
        $materialMls = $material->mls->keyBy('lng_code');
        return view('dashboard.materials.edit', compact('material', 'materialMls'));
    }

    /**
     * @param MaterialRequest $request
     * @param Material $material
     * @return RedirectResponse
     */
    public function update(MaterialRequest $request, Material $material): RedirectResponse
    {
        Material::saveData($request->validated(), $material);

        flash()->success('Material Updated');
        return redirect()->route('dashboard.materials.index');
    }

    /**
     * @param Material $material
     * @return RedirectResponse
     */
    public function destroy(Material $material): RedirectResponse
    {
        $material->delete();
        flash()->success('Material Deleted');
        return redirect()->route('dashboard.materials.index');
    }
}
