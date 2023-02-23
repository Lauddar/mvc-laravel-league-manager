<div class="relative overflow-x-auto">
    <table class="w-full text-left text-gray-500 dark:text-gray-400">
        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    EQUIPO
                </th>
                <th scope="col" class="px-6 py-3">
                    CLUB
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    POSICIÓN
                </th>
            </tr>
        </thead>
        <tbody>
            @php
            $teams = $league->teams()->orderByPivot('position', 'asc')->get();
            @endphp
            @foreach($teams as $team)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a>
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('clubs.show', $team->club->id)}}">{{$team->club->name}}</a>
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->position}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(count($teams) == 0) <p class="pl-8 pt-3 text-gray-400 text-sm">No hay equipos añadidos a la liga.</p>
    @endif
</div>