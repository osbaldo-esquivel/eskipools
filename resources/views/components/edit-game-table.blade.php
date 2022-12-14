@props(['games', 'picks', 'week', 'score'])

<table class="w-full flex flex-row flex-no-wrap rounded-lg overflow-hidden sm:shadow-lg my-5">
    <thead class="invisible sm:visible">
        <tr class="bg-gray-200 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
            <th class="p-3">Teams</thc>
            <th class="p-3">City</th>
            <th class="p-3">Date</th>
            <th class="p-3">Choose team</th>
            <th class="p-3">Pick</th>
        </tr>
    </thead>
    <tbody class="flex-1 sm:flex-none">
        @foreach ($games as $game)
            <tr class="bg-white flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                <td class="text-center border-grey-light border hover:bg-gray-100 p-3">
                    <p>{{ ucfirst($game->away_team) }} @ {{ ucfirst($game->home_team) }}</p>
                </td>
                <td class="text-center border-grey-light border hover:bg-gray-100 p-3">{{ $game->city }}</td>
                <td class="text-center border-grey-light border hover:bg-gray-100 p-3">{{ $game->date }}</td>
                <td class="text-center border-grey-light border hover:bg-gray-100 p-3">
                    <div class="flex justify-center space-x-8">
                        <div>
                            <form action="\submit-picks" method="POST">
                                <button type="submit" onclick="this.form.submit()">
                                    @csrf
                                    <img src="{{ url("/images/$game->home_team.ico") }}" class="h-12 mx-auto" alt="{{ $game->home_team }}" />
                                    <input type="hidden" name="team" value="{{ strtolower($game->home_team) }}">
                                    <input type="hidden" name="game_id" value="{{ $game->id }}" />
                                    <input type="hidden" name="week_id" value="{{ $week->id }}" />
                                    <input type="hidden" name="id" value="{{ $picks->where('game_id', $game->id)->first()?->id }}" />
                                </button>
                            </form>
                        </div>
                        <div>
                            <form action="\submit-picks" method="POST">
                                <button type="submit" onclick="this.form.submit()">
                                    @csrf
                                    <img src="{{ url("/images/$game->away_team.ico") }}" class="h-12 mx-auto" />
                                    <input type="hidden" name="team" value="{{ strtolower($game->away_team) }}">
                                    <input type="hidden" name="game_id" value="{{ $game->id }}" />
                                    <input type="hidden" name="week_id" value="{{ (string) $week->id }}" />
                                    <input type="hidden" name="id" value="{{ $picks->where('game_id', $game->id)->first()?->id }}" />
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
                <td class="text-center border-grey-light border hover:bg-gray-100 p-3">
                    <div class="items-center justify-center">
                        @if ($pick = $picks->where('game_id', $game->id)->first()?->team)
                            <div>
                                <img src="{{ url("/images/$pick.ico") }}" class="h-24 mx-auto" />                            
                            </div>
                            <div>
                                <form action="\clear-pick" method="POST">
                                    <x-button type="submit" class="h-4" onclick="this.form.submit()">
                                        @csrf
                                        @method('DELETE')
                                        <p>Cancel</p>
                                        <input type="hidden" name="id" value="{{ $picks->where('game_id', $game->id)->first()?->id }}" />
                                    </x-button>
                                </form>
                            </div>
                        @else
                            <div></div>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        <tr class="bg-white flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
            <td colspan="3" class="text-center sm:text-right border-grey-light border hover:bg-gray-100 p-3">Total MNF score</td>
            <td class="text-center border-grey-light border hover:bg-gray-100 p-3">
                <div>
                    <form action="\submit-score" method="post">
                        @csrf
                        <x-number :name="__('score')" :value="$score['score']"></x-number>
                        <input type="hidden" name="id" value="{{ $score['id'] }}" />
                        <input type="hidden" name="week_id" value="{{ (string) $picks->first()?->week_id }}" />
                        <x-button type="submit">Submit score</x-button>
                    </form>
                </div>
            </td>
            <td class="text-center">
                <div>
                    <a href="{{ route('current-week') }}">
                        <button class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Pool
                        </button>
                    </a>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<style>
    html,
    body {
      height: 100%;
    }
  
    @media (min-width: 640px) {
      table {
        display: inline-table !important;
      }
  
      thead tr:not(:first-child) {
        display: none;
      }
    }
  
    td:not(:last-child) {
      border-bottom: 0;
    }
  
    th:not(:last-child) {
      border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
  </style>