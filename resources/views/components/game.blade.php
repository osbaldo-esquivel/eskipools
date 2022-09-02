@props(['games', 'picks', 'week', 'score'])

<div class="container">
    <x-edit-game-table :games="$games" :picks="$picks" :week="$week" :score="$score"></x-edit-game-table>
</div>