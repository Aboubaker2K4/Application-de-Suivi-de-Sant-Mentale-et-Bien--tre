<?php

namespace App\Http\Controllers;

use App\Models\Habitlog;
use Illuminate\Http\Request;

class HabitlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitlogs = Habitlog::all();
        return view('habitlogs.index', compact('habitlogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habitlogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'habit_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        $habitlog = Habitlog::create([
            'habit_name' => $validatedData['habit_name'],
            'date' => $validatedData['date'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('habitlogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitlog $habitlog)
    {
        return view('habitlogs.show', compact('habitlog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitlog $habitlog)
    {
        return view('habitlogs.edit', compact('habitlog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitlog $habitlog)
    {
        $validatedData = $request->validate([
            'habit_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        $habitlog->update([
            'habit_name' => $validatedData['habit_name'],
            'date' => $validatedData['date'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('habitlogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitlog $habitlog)
    {
        $habitlog->delete();
        return redirect()->route('habitlogs.index');
    }
}
