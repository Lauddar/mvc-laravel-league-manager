<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::orderBy('id', 'desc')->paginate(15);

        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'location' => 'required|max:50'
        ]);

        $club = Club::create($request->all());

        return redirect()->route('clubs.show', $club);
    }

    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => 'required|max:50',
            'location' => 'required|max:50'
        ]);


        $club->update($request->all());

        return redirect()->route('clubs.show', $club);
    }

    public function destroy(Club $club){
        $club->delete();

        return redirect()->route('clubs.index');
    }
}
