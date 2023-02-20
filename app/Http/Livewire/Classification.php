<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Classification extends Component
{
    public $league;
    public $sort = 'position';
    public $direction = 'asc';

    public function render()
    {
        $teams = $this->league->teams()->orderBy($this->sort, $this->direction)->get();
        return view('livewire.classification', compact('teams'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }
}
