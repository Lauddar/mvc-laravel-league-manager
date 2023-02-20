<div>
    <div class="overflow-x-scroll">
        <table class="w-full text-left text-gray-500 dark:text-gray-400">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-sm">
                        EQUIPO
                    </th>
                    <th scope="col" class="px-6 py-3 text-sm">
                        CLUB
                    </th>
                    <th scope="col" class="cursor-pointer text-sm px-6 py-3" wire:click="order('victories')">
                        VICTORIAS
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-center text-sm" wire:click="order('defeats')">
                        DERROTAS
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-center text-sm" wire:click="order('ties')">
                        EMPATES
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-center text-sm" wire:click="order('scored_goals')">
                        GOLES MARCADOS
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-center text-sm" wire:click="order('conceded_goals')">
                        GOLES RECIBIDOS
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-center text-sm" wire:click="order('punctuation')">
                        PUNTUACIÓN
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-center text-sm" wire:click="order('position')">
                        POSICIÓN
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 truncate font-medium text-gray-900">
                        <a href="{{route('teams.show', $team)}}">{{$team->name}}</a>
                    </td>
                    <td class="px-6 py-4 truncate">
                        <a href="{{route('clubs.show', $team->club)}}">{{$team->club->name}}</a>
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
        @if(count($teams) == 0) <p class="pl-8 pt-3 text-gray-400 text-sm">No hay equipos añadidos a la liga.</p>
        @endif
    </div>
</div>