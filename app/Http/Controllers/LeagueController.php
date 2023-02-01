<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{    
    public function index()
    {
        $leagues = League::orderBy('id', 'desc')->paginate();

        return view('leagues.index', compact('leagues'));
    }

    public function create()
    {
        return view('leagues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
        ]);

        $league = League::create($request->all());

        return redirect()->route('leagues.show', $league);
    }

    public function show(League $league)
    {
        return view('leagues.show', compact('league'));
    }

    public function edit(League $league)
    {
        return view('leagues.edit', compact('league'));
    }

    public function update(Request $request, League $league)
    {
        $request->validate([
            'name' => 'required|max:50',
            'location' => 'required|max:50'
        ]);


        $league->update($request->all());

        return redirect()->route('leagues.show', $league);
    }

    public function destroy(League $league){
        $league->delete();

        return redirect()->route('leagues.index');
    }
}
