<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use App\Models\FootballMatch;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{

    public function index(League $league)
    {
        return view('leagues.footballMatches.index', compact('league'));
    }

    public function create(League $league)
    {
        return view('footballMatches.create', compact('league'));
    }

    public function store(Request $request, League $league)
    {
        $request->validate([
            'local_team' => 'required',
            'visiting_team' => 'different:local_team',
            'start_date' => 'required',
        ]);

        $league->footballMatches()->create([
            'local_team' => $request->input('local_team'),
            'visiting_team' => $request->input('visiting_team'),
            'start_date' => $request->input('start_date'),
            'location' => Team::find(1)->where('id', $request->input('local_team'))->first()->club->location
        ]);

        return redirect()->route('leagues.footballmatches.index', $league);
    }

    public function show(FootballMatch $footballMatch)
    {
        return view('footballMatches.show', compact('footballMatch'));
    }

    public function edit(FootballMatch $footballmatch)
    {
        return view('footballMatches.edit', compact('footballmatch'));
    }

    public function update(Request $request, FootballMatch $footballmatch)
    {
        $request->validate([
            'start_date' => 'required',
            'local_goals' => 'nullable|gte:0',
            'visiting_goals' => 'nullable|gte:0',
        ]);

        $footballmatch->update($request->all());

        $footballmatch->league->updateClassification();
        
        return redirect()->route('leagues.footballmatches.index', $footballmatch->league);
    }

    public function destroy(FootballMatch $footballmatch)
    {
        $league = $footballmatch->league;

        $footballmatch->delete();

        $footballmatch->league->updateClassification();

        return redirect()->route('leagues.footballmatches.index', $league);
    }

    public function generateFootballMatches(League $league)
    {
        $weekendDays = $this->getWeekendDays($league->start_date, $league->end_date);

        $pairs = $this->getPairs($league->teams);

        foreach ($pairs as $pair) {
            $dates = array_rand($weekendDays, 2);
            $this->createFootballMatch($league, $pair[0], $pair[1], $weekendDays[$dates[0]]);
            $this->createFootballMatch($league, $pair[1], $pair[0], $weekendDays[$dates[1]]);
        }

        return redirect()->route('leagues.footballmatches.index', $league);
    }

    protected function getWeekendDays($iniDate, $endDate)
    {
        $weekendDays = array();
        $date = date_create($iniDate);
        $endDate = date_create($endDate);

        while ($date <= $endDate) {
            if (date_format($date, 'l') == 'Saturday' || date_format($date, 'l') == 'Sunday') {
                array_push($weekendDays, $date->format('Y-m-d 12:00:00'));
            }
            $date->modify("+1 days");
        }

        return $weekendDays;
    }

    function getPairs($teams)
    {
        $pairs = array();

        foreach ($teams as $key => $team) {
            for ($i = $key + 1; $i < count($teams); $i++) {
                array_push($pairs, [$team, $teams[$i]]);
            }
        }

        return $pairs;
    }

    function createFootballMatch(League $league, Team $local, Team $visiting, String $start_date)
    {
        $data = [
            'local_team' => $local->id,
            'visiting_team' => $visiting->id,
            'start_date' => $start_date,
            'location' => $local->club->location
        ];

        $league->footballMatches()->create($data);
    }
}
