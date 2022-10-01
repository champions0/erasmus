<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Image;
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
        $images = Image::inRandomOrder()->with('activity.currentML')->limit(10)->get();
        return view('home', compact('partners', 'activities', 'materials', 'images'));
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
    public function gallery(): View
    {
        $images = Image::with('activity.currentMl')->paginate(20);

        return view('gallery', compact('images'));
    }

    /**
     * @return View
     */
    public function about(): View
    {
        return view('about');
    }
}
