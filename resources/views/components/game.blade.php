@props(['games', 'picks', 'week'])

<div class="container">
    <x-edit-game-table :games="$games" :picks="$picks" :week="$week"></x-edit-game-table>
</div>