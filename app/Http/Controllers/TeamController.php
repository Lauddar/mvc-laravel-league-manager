<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Club;
use App\Models\League;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(League $league)
    {
        $teams = Team::orderBy('id', 'desc')->paginate(10);

        return view('teams.index', compact('teams', 'league'));
    }

    public function create(Club $club)
    {
        return view('clubs.teams.create', compact('club'));
    }

    public function store(Request $request, Club $club)
    {
        $request->validate([
            'name' => 'required|max:50'
        ]);

        $team = $club->teams()->create($request->all());

        return redirect()->route('teams.show', $team);
    }

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|max:50'
        ]);


        $team->update($request->all());

        return redirect()->route('teams.show', $team);
    }

    public function destroy(Team $team){
        $club = $team->club;
        
        $team->delete();

        return redirect()->route('clubs.show', $club);
    }
}
