@props(['week', 'picks'])

<div class="container">
    <x-edit-game-table :week="$week" :picks="$picks"></x-edit-game-table>
</div>