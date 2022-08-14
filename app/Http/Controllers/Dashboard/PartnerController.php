<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $partners = Partner::latest()->paginate(20);
        return view('dashboard.partners.index', compact('partners'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.partners.create');
    }

    /**
     * @param PartnerRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerRequest $request): RedirectResponse
    {
        Partner::saveData($request->validated());

        flash()->success('Partner Added');
        return redirect()->route('dashboard.partners.index');
    }

    /**
     * @param Partner $partner
     * @return View
     */
    public function edit(Partner $partner): View
    {
        $partnerMls = $partner->mls->keyBy('lng_code');
        return view('dashboard.partners.edit', compact('partner', 'partnerMls'));
    }

    /**
     * @param PartnerRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(PartnerRequest $request, Partner $partner): RedirectResponse
    {
        Partner::saveData($request->validated(), $partner);

        flash()->success('Partner Updated');
        return redirect()->route('dashboard.partners.index');
    }

    /**
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        $partner->delete();
        flash()->success('Partner Deleted');
        return redirect()->route('dashboard.partners.index');
    }
}
