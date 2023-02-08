<table>
    <tr>
        <th>Equipo local</th>
        <th>Equipo visitante</th>
        <th>Fecha</th>
        <th>Goles locales</th>
        <th>Goles visitante</th>
        <th></th>
        <th></th>
    </tr>

    @foreach($league->footballmatches as $footballmatch)
    <tr>
        <td>
            {{$footballmatch->local->name}}
        </td>
        <td>
            {{$footballmatch->visiting->name}}
        </td>
        <td>
            {{$footballmatch->start_date}}
        </td>
        <td>
            {{$footballmatch->local_goals}}
        </td>
        <td>
            {{$footballmatch->visiting_goals}}
        </td>
        <td>
            <a href="{{route('footballmatches.edit', $footballmatch)}}">Editar</a>
        </td>
        <td>
            <form action="{{route('footballmatches.destroy', $footballmatch)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>