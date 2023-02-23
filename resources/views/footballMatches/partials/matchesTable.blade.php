<div class="relative overflow-x-auto">
    <table class="w-full text-left text-gray-500 dark:text-gray-400">
        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    EQUIPO LOCAL
                </th>
                <th scope="col" class="px-6 py-3">
                    EQUIPO VISITANTE
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    FECHA
                </th>
                <th scope="col" class="px-1 py-3 text-center">
                    GOLES LOCAL
                </th>
                <th scope="col" class="px-1 py-3 text-center">
                    GOLES VISITANTE
                </th>
                @auth
                <th scope="col" class="px-6 py-3 text-center">
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                </th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($league->footballmatches as $footballmatch)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    <a href="{{route('teams.show', $footballmatch->local)}}">{{$footballmatch->local->name}}</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('teams.show', $footballmatch->visiting)}}">{{$footballmatch->visiting->name}}</a>
                </td>
                <td class="px-6 py-4 text-center">
                    {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $footballmatch->start_date)->format('d-m-Y')}}
                </td>
                <td class="px-6 py-1 text-center">
                    {{$footballmatch->local_goals}}
                </td>
                <td class="px-6 py-1 text-center">
                    {{$footballmatch->visiting_goals}}
                </td>
                @auth
                <td>
                    <a class="flex items-center text-sm" href="{{route('footballmatches.edit', $footballmatch)}}"><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                </td>
                <td>
                    <form action="{{route('footballmatches.destroy', $footballmatch)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este partido?')" class="text-sm" href="{{route('footballmatches.edit', $footballmatch)}}"><i class="fa-solid fa-trash"></i>Eliminar</button>
                    </form>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(count($league->footballmatches) == 0) <p class="pl-8 pt-3 text-gray-400 text-sm">No hay partidos en la liga.</p>
    @endif
</div>