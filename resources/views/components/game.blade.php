@props(['week', 'picks'])

<div class="min-h-screen flex flex-col sm:justify-center items-center px-12 sm:pt-0 bg-gray-100">
    <div class="w-full mt-6 px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <x-game-table :week="$week" :picks="$picks"></x-game-table>
    </div>
</div>