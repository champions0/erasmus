<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $activities = Activity::latest()->paginate(20);
        return view('dashboard.activities.index', compact('activities'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.activities.create');
    }

    /**
     * @param ActivityRequest $request
     * @return RedirectResponse
     */
    public function store(ActivityRequest $request): RedirectResponse
    {
        Activity::saveData($request->validated());

        flash()->success('Activity Added');
        return redirect()->route('dashboard.activities.index');
    }

    /**
     * @param Activity $activity
     * @return View
     */
    public function edit(Activity $activity): View
    {
        $activityMls = $activity->mls->keyBy('lng_code');
        return view('dashboard.activities.edit', compact('activity', 'activityMls'));
    }

    /**
     * @param ActivityRequest $request
     * @param Activity $activity
     * @return RedirectResponse
     */
    public function update(ActivityRequest $request, Activity $activity): RedirectResponse
    {
        Activity::saveData($request->validated(), $activity);

        flash()->success('Activity Updated');
        return redirect()->route('dashboard.activities.index');
    }

    /**
     * @param Activity $activity
     * @return RedirectResponse
     */
    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();
        flash()->success('Activity Deleted');
        return redirect()->route('dashboard.activities.index');
    }
}
