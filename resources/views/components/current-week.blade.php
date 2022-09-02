@props(['games', 'week'])

<table class="w-full flex flex-row flex-no-wrap rounded-lg overflow-hidden sm:shadow-lg my-5">
    <thead>
        <tr class="bg-gray-200 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
            <th class="p-3">User</th>
            @foreach ($games as $game)
                <th class="p-3">{{ ucfirst($game->away_team) }} @ {{ ucfirst($game->home_team) }}</th>
            @endforeach
            <th class="p-3">MNF Score</th>
            <th class="p-3">Wins</th>
        </tr>
    </thead>
    <tbody class="flex-1 sm:flex-none">
        <tr class="bg-gray-200 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">

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