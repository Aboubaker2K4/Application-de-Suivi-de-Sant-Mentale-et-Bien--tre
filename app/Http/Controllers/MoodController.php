<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moods = Mood::all();
        return view('moods.index', compact('moods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('moods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validetedData = $request->validate([
            'note' => 'required|string|max:255',
            'niveau' => 'required|integer',
        ]);
       $mood = Mood::create([
            'note' => $validetedData['note'],
            'niveau' => $validetedData['niveau'] ?? null,
        ]);
        return redirect()->route('moods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mood $mood)
    {
        return view('moods.show', compact('mood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mood $mood)
    {
        return view('moods.edit', compact('mood'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mood $mood)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $mood->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
        ]);

        return redirect()->route('moods.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mood $mood)
    {
        $mood->delete();
        return redirect()->route('moods.index');
    }
}
