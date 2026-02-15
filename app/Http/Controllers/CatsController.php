<?php

namespace App\Http\Controllers;

use App\Models\Cats;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    public function index()
    {
        $cats = Cats::all();
        return view('cats.index', compact('cats'));
    }

    public function create()
    {
        return view('cats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer',
        ]);

        Cats::create($validated);
        return redirect()->route('cats.index')->with('success', 'Cat created successfully.');
    }

    public function edit(Cats $cats)
    {
        return view('cats.edit', compact('cats'));
    }

    public function update(Request $request, Cats $cats)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer',
        ]);

        $cats->update($validated);
        return redirect()->route('cats.index')->with('success', 'Cat updated successfully.');
    }

    public function destroy(Cats $cats)
    {
        $cats->delete();
        return redirect()->route('cats.index')->with('success', 'Cat deleted successfully.');
    }
}