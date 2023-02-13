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
                <th scope="col" class="px-6 py-3">
                    PARTIDOS GANADOS
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    PARTIDOS PERDIDOS
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    PARTIDOS EMPATADOS
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    GOLES MARCADOS
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    GOLES RECIBIDOS
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    PUNTUACIÓN
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    POSICIÓN
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    <a href="{{route('teams.show', $team)}}">{{$team->name}}</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('leagues.show', $league)}}">{{$team->club->name}}</a>
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->victories}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->defeats}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->ties}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->scored_goals}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->conceded_goals}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->punctuation}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$team->pivot->position}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>