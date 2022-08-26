@props(['week', 'picks'])

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Teams</thc>
            <th>City</th>
            <th>Date</th>
            <th>Choose team</th>
            <th>Pick</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($week->games->sortBy('time') as $game)
            <tr>
                <td class="text-center">
                    <p>{{ $game->away_team }} @ {{ $game->home_team }}</p>
                </td>
                <td class="text-center">{{ $game->city }}</td>
                <td class="text-center">{{ $game->time }}</td>
                <td class="text-center">
                    <div class="flex justify-center space-x-4">
                        <div>
                            <form action="\submit-picks" method="POST">
                                <x-button type="submit" onclick="this.form.submit()">
                                    @csrf
                                    <p>{{ $game->home_team }}</p>
                                    <input type="hidden" name="team" value="{{ strtolower($game->home_team) }}">
                                    <input type="hidden" name="game_id" value="{{ $game->id }}" />
                                    <input type="hidden" name="week_id" value="{{ $week->id }}" />
                                    <input type="hidden" name="id" value="{{ $picks->where('game_id', $game->id)->first()?->id }}" />
                                </x-button>
                            </form>
                        </div>
                        <div>
                            <form action="\submit-picks" method="POST">
                                <x-button type="submit" onclick="this.form.submit()">
                                    @csrf
                                    <p>{{ $game->away_team }}</p>
                                    <input type="hidden" name="team" value="{{ strtolower($game->away_team) }}">
                                    <input type="hidden" name="game_id" value="{{ $game->id }}" />
                                    <input type="hidden" name="week_id" value="{{ (string) $week->id }}" />
                                    <input type="hidden" name="id" value="{{ $picks->where('game_id', $game->id)->first()?->id }}" />
                                </x-button>
                            </form>
                        </div>
                        <div>
                            <form action="\clear-pick" method="POST">
                                <x-button type="submit" onclick="this.form.submit()">
                                    @csrf
                                    @method('DELETE')
                                    <p>X</p>
                                    <input type="hidden" name="id" value="{{ $picks->where('game_id', $game->id)->first()?->id }}" />
                                </x-button>
                            </form>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    @if ($pick = $picks->where('game_id', $game->id)->first()?->team)
                        <img src="{{ url("/images/$pick.ico") }}" class="h-12" />
                    @else
                        <p></p>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>