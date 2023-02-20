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
}
