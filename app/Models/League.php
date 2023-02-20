<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function footballMatches()
    {
        return $this->hasMany('App\Models\FootballMatch');
    }

    // Many to many relationship
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team')->withPivot('punctuation', 'position', 'victories', 'defeats', 'ties', 'scored_goals', 'conceded_goals');
    }

    function updateClassification()
    {
        $this->restoreValues();
        $this->updateMatchesResults();
        $this->updatePunctuation();
        $this->updatePositions();
    }

    function updateMatchesResults()
    {
        foreach ($this->footballMatches as $footballmatch) {
            if (isset($footballmatch->local_goals)) {
                $local = $footballmatch->local;
                $visiting = $footballmatch->visiting;
                if ($footballmatch->local_goals == $footballmatch->visiting_goals) {
                    $this->incTies($local);
                    $this->incTies($visiting);
                } else if ($footballmatch->local_goals > $footballmatch->visiting_goals) {
                    $this->incVictories($local);
                    $this->incDefeats($visiting);
                } else {
                    $this->incVictories($visiting);
                    $this->incDefeats($local);
                }
                $this->addGoals($footballmatch);
            }
        }
    }

    function incTies($team)
    {
        $teamLeague = $team->leagues()->where('league_id', $this->id)->first();
        if (isset($team)) {
            $ties = $teamLeague->pivot->ties + 1;
            $teamLeague->pivot->update(['ties' => $ties]);
        }
    }

    function incVictories($team)
    {

        $teamLeague = $team->leagues()->where('league_id', $this->id)->first();
        if (isset($teamLeague)) {
            $victories = $teamLeague->pivot->victories + 1;
            $teamLeague->pivot->update(['victories' => $victories]);
        }
    }

    function incDefeats($team)
    {

        $teamLeague = $team->leagues()->where('league_id', $this->id)->first();
        if (isset($teamLeague)) {
            $defeats = $teamLeague->pivot->defeats + 1;
            $teamLeague->pivot->update(['defeats' => $defeats]);
        }
    }

    function addGoals($footballmatch)
    {
        $teamLeague = $footballmatch->local->leagues()->where('league_id', $this->id)->first();
        if (isset($teamLeague)) {
            $scored_goals = $teamLeague->pivot->scored_goals + $footballmatch->local_goals;
            $conceded_goals = $teamLeague->pivot->conceded_goals + $footballmatch->visiting_goals;
            $teamLeague->pivot->update(['scored_goals' => $scored_goals, 'conceded_goals' => $conceded_goals]);
        }

        $teamLeague = $footballmatch->visiting->leagues()->where('league_id', $this->id)->first();
        if (isset($teamLeague)) {
            $scored_goals = $teamLeague->pivot->scored_goals + $footballmatch->visiting_goals;
            $conceded_goals = $teamLeague->pivot->conceded_goals + $footballmatch->local_goals;
            $teamLeague->pivot->update(['scored_goals' => $scored_goals, 'conceded_goals' => $conceded_goals]);
        }
    }

    function updatePunctuation()
    {
        foreach ($this->teams as $leagueTeam) {
            $team = $leagueTeam->leagues()->where('league_id', $this->id)->first();
            $punctuation = $team->pivot->victories * 3 + $team->pivot->ties;
            $leagueTeam->pivot->update(['punctuation' => $punctuation]);
        }
    }

    function updatePositions()
    {
        $teams = $this->getOrderByPunctuation();
        $i = 1;
        foreach ($teams as $team) {
            $team->pivot->update(['position' => $i]);
            $i++;
        }
    }

    function getOrderByPosition()
    {
        return $this->teams()->orderByPivot('position', 'asc')->get();
    }

    function getOrderByPunctuation()
    {
        $orderByPunctuation = $this->teams()->orderByPivot('punctuation', 'desc')->orderByPivot('scored_goals', 'desc')->orderByPivot('conceded_goals', 'asc')->get();
       
        return $orderByPunctuation;
    }

    public function restoreValues()
    {
        foreach ($this->teams as $leagueTeam) {
            $leagueTeam->pivot->update([
                'punctuation' => 0,
                'position' => 0,
                'victories' => 0,
                'defeats' => 0,
                'ties' => 0,
                'scored_goals' => 0,
                'conceded_goals' => 0
            ]);
        }
    }
}
