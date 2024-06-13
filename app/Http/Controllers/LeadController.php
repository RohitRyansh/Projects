<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::where('user_id', Auth::id())
            ->status(request()->tab)
            ->get();
        $types = Lead::TYPES;

        return view('pages.leads.index', compact('leads', 'types'));
    }

    public function create()
    {
        $types = Lead::TYPES;

        return view('pages.leads.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        $validated['user_id'] = Auth::id();

        Lead::create($validated);

        toastr()->success('Lead added successfully!');

        return to_route('leads', ['tab' => $request->tab]);
    }

    public function edit(Lead $lead)
    {
        $types = Lead::TYPES;

        return view('pages.leads.edit', compact('lead', 'types'));
    }

    public function update(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();


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
