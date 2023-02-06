<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function club(){
        return $this->belongsTo('App\Models\Club');
    }

    // Many to many relationship
    public function leagues(){
        return $this->belongsToMany('App\Models\League')->withPivot('punctuation', 'position', 'victories', 'defeats', 'ties', 'scored_goals', 'conceded_goals');
    }
}
