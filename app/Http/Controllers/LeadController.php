<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Models\WebType;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {
        $webTypes = WebType::with(['leads' => function ($query) {
            $query->where('user_id', Auth::id())
                  ->status(request()->tab);
        }])
        ->get();

        return view('pages.leads.index', compact('webTypes'));
    }

    public function create()
    {
        $types = WebType::ALL_TYPES;

        return view('pages.leads.create', compact('types'));
    }

    public function store(LeadRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        Lead::create($validated);

        toastr()->success('Lead added successfully!');

        return to_route('leads', ['tab' => $request->tab]);
    }

    public function edit(Lead $lead)
    {
        $types = WebType::ALL_TYPES;

        return view('pages.leads.edit', compact('lead', 'types'));
    }

    public function update(LeadRequest $request, Lead $lead)
    {
        $validated = $request->validated();

        $lead->update($validated);

        toastr()->success('Lead updated successfully!');

        return to_route('leads', ['tab' => $request->tab]);
    }

    public function delete(Lead $lead)
    {
        $lead->delete();

        toastr()->success('Lead deleted successfully!');

        return to_route('leads', ['tab' => request()->tab]);
    }
}
