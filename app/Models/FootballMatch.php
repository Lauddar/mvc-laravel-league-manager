<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    public function local()
    {
        return $this->belongsTo('App\Models\Team', 'local_team');
    }

    public function visiting()
    {
        return $this->belongsTo('App\Models\Team', 'visiting_team');
    }

    /*function updateClassification()
    {
        if ($this->local_goals == $this->visiting_goals) {
            $this->local->punctuation++;
            $this->visiting->punctuation++;
        } else if ($this->local_goals > $this->visiting_goals) {
            $this->local->belongsToMany(Team::class)->wherePivot('league_id', $this->league->id);         
        } else {
            $punctuation = 3;

            foreach($this->visiting->leagues as $relation){
                $punctuation = $relation->pivot->punctuation;
            }
            $punctuation = $this->visiting->leagues()->where('league_id', $this->league->id)->first()->pivot->punctuation;
            $punctuation += 3;
            $this->visiting->leagues()->updateExistingPivot($this->league->id, ['punctuation' => $punctuation]);
        }
    }*/
}
