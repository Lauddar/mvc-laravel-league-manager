<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function footballMatches(){
        return $this->hasMany('App\Models\FootballMatch');
    }

    // Many to many relationship
    public function teams(){
        return $this->belongsToMany('App\Models\Team')->withPivot('punctuation', 'position', 'victories', 'defeats', 'ties', 'scored_goals', 'conceded_goals');
    }
}
