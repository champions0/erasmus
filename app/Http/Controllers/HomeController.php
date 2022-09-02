<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Material;
use App\Models\Partner;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $partners = Partner::home()->with('currentML')->get();
        $activities = Activity::home()->with('currentML')->ordered()->limit(6)->get();
        $materials = Material::home()->with('currentML')->ordered()->limit(6)->get();
        return view('home', compact('partners', 'activities', 'materials'));
    }

    /**
     * @return View
     */
    public function partners(): View
    {
        $partners = Partner::with('currentMl')->get();

        return view('partners', compact('partners'));
    }

    /**
     * @return View
     */
    public function about(): View
    {
        return view('about');
    }
}
