<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $activities = Activity::with('currentMl')->ordered()->paginate(5);

        return view('activities', compact('activities'));
    }

    /**
     * @param Activity $activity
     * @return View
     */
    public function show(Activity $activity): View
    {
        return view('activity', compact('activity'));
    }
}
