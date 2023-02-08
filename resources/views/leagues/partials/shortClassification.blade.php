<table>
    <tr>
        <th>Equipo</th>
        <th>Club</th>
        <th>Posición</th>
    </tr>
    @php
    $teams = $league->teams()->orderByPivot('position', 'asc')->get();
    @endphp

    @foreach($teams as $team)
    <tr>
        <td>
        <a href="{{route('leagues.show', $league->id)}}">{{$team->name}}</a>
        </td>
        <td>
        {{$team->club->name}}</a>
        </td>
        <td>
        {{$team->pivot->position}}
        </td>
    </tr>
    @endforeach
</table>
