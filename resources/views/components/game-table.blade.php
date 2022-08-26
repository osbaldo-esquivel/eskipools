@props(['week'])

<table class="table w-full">
    <thead>
        <tr>
            <th>Teams</th>
            <th>City</th>
            <th>Date</th>
            <th></th>
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
                                    <input type="hidden" name="teams" value="{{ strtolower($game->home_team) }}">
                                    <input type="hidden" name="game_id" value="{{ $game->id }}" />
                                    <input type="hidden" name="week_id" value="{{ $week->id }}" />
                                    <input type="hidden" name="id" value="{{ (string) $game->picks->where('user_id', auth()->user()->id)->first()?->id }}" />
                                </x-button>
                            </form>
                        </div>
                        <div>
                            <form action="\submit-picks" method="POST">
                                <x-button type="submit" onclick="this.form.submit()">
                                    @csrf
                                    <p>{{ $game->away_team }}</p>
                                    <input type="hidden" name="teams" value="{{ strtolower($game->away_team) }}">
                                    <input type="hidden" name="game_id" value="{{ $game->id }}" />
                                    <input type="hidden" name="week_id" value="{{ (string) $week->id }}" />
                                    <input type="hidden" name="id" value="{{ (string) $game->picks->where('user_id', auth()->user()->id)->first()?->id }}" />
                                </x-button>
                            </form>
                        </div>
                    </div>
                </td>
                <td class="text-center">{{ $game->picks->where('user_id', auth()->user()->id)->first()?->teams }}</td>
            </tr>
        @endforeach
    </tbody>
</table>