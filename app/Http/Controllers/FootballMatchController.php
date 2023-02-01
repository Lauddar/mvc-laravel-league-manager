<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    
    public function index()
    {
        $footballMatches = FootballMatch::orderBy('id', 'desc')->paginate();

        return view('footballMatches.index', compact('footballMatches'));
    }

    public function create()
    {
        return view('footballMatches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
        ]);

        $footballMatch = FootballMatch::create($request->all());

        return redirect()->route('footballMatches.show', $footballMatch);
    }

    public function show(FootballMatch $footballMatch)
    {
        return view('footballMatches.show', compact('footballMatch'));
    }

    public function edit(FootballMatch $footballMatch)
    {
        return view('footballMatches.edit', compact('footballMatch'));
    }

    public function update(Request $request, FootballMatch $footballMatch)
    {
        $request->validate([
            'name' => 'required|max:50',
            'location' => 'required|max:50'
        ]);


        $footballMatch->update($request->all());

        return redirect()->route('footballMatches.show', $footballMatch);
    }

    public function destroy(FootballMatch $footballMatch){
        $footballMatch->delete();

        return redirect()->route('footballMatches.index');
    }
}
