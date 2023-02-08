<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
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
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $league = League::create($request->all());
        $league->update(['state' => 'TO START']);

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
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $league->update($request->all());

        return redirect()->route('leagues.show', $league);
    }

    public function destroy(League $league)
    {
        $league->delete();

        return redirect()->route('leagues.index');
    }

    public function listTeams(Request $request, League $league)
    {
        $notAddedTeams = $this->listNotAddedTeams($league);

        $text = trim($request->get('search'));
        if (!empty($text)) {
            $notAddedTeams = $notAddedTeams->toQuery()->where('name', 'LIKE', '%' . $text . '%')->get();
        }

        return view('leagues.addTeams', compact('notAddedTeams', 'league', 'text'));
    }

    public function listNotAddedTeams(League $league)
    {

        $teams = Team::whereDoesntHave('leagues', function (Builder $query) use ($league) {
            $query->where('league_id', $league->id);
        })->orderBy('id', 'desc')->paginate();

        return $teams;
    }

    public function addTeams(Request $request, League $league)
    {

        foreach ($request->teamsList as $key => $team) {
            $league->teams()->attach($team, [
                'punctuation' => 0,
                'position' => 0,
                'victories' => 0,
                'defeats' => 0,
                'ties' => 0,
                'scored_goals' => 0,
                'conceded_goals' => 0
            ]);
        }

        return redirect()->route('leagues.listTeams', $league);
    }

    public function removeTeams(Request $request, League $league)
    {
        foreach ($request->teamsList as $key => $team) {
            $league->teams()->detach($team);
        }
        return redirect()->route('leagues.listTeams', $league);
    }

    function classification(League $league)
    {
        $teams = $league->getOrderByPosition();

        return view('leagues.classification', compact('teams', 'league'));
    }

}
