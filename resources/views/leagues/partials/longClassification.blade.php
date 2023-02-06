<table>
    <tr>
        <th>Equipo</th>
        <th>Club</th>
        <th>Partidos ganados</th>
        <th>Partidos perdidos</th>
        <th>Partidos empatados</th>
        <th>Goles marcados</th>
        <th>Goles recibidos</th>
        <th>Puntuación</th>
        <th>Posición</th>
    </tr>
    @foreach($teams as $team)
    <tr>
        <td>
        <a href="{{route('leagues.show', $league->id)}}">{{$team->name}}</a>
        </td>
        <td>
        {{$team->club->name}}</a>
        </td>
        <td>
        {{$team->pivot->victories}}
        </td>
        <td>
        {{$team->pivot->defeats}}
        </td>
        <td>
        {{$team->pivot->ties}}
        </td>
        <td>
        {{$team->pivot->scored_goals}}
        </td>
        <td>
        {{$team->pivot->conceded_goals}}
        </td>
        <td>
        {{$team->pivot->punctuation}}
        </td>
        <td>
        {{$team->pivot->position}}
        </td>

    </tr>
    @endforeach
</table>
