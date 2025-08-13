<?php

namespace App\Http\Controllers;

use App\Models\FundTax;
use Illuminate\Http\Request;

class FundTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = FundTax::query();
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('department_name', 'like', "%{$search}%");
            });
        }
        
        $fundTaxes = $query->paginate(10);
        return view('admin.fund-taxes.index', compact('fundTaxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fund-taxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'tax_allocated' => 'required|numeric|min:0'
        ]);

        FundTax::create($request->all());

        return redirect()->route('admin.fund-taxes.index')->with('success', 'Fund & Tax record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FundTax $fundTax)
    {
        return view('admin.fund-taxes.show', compact('fundTax'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FundTax $fundTax)
    {
        return view('admin.fund-taxes.edit', compact('fundTax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FundTax $fundTax)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'tax_allocated' => 'required|numeric|min:0'
        ]);

        $fundTax->update($request->all());

        return redirect()->route('admin.fund-taxes.index')->with('success', 'Fund & Tax record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundTax $fundTax)
    {
        $fundTax->delete();
        return redirect()->route('admin.fund-taxes.index')->with('success', 'Fund & Tax record deleted successfully.');
    }
}
