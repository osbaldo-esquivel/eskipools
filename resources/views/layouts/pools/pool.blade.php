<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($week->number) }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center">
        <x-current-week :week="$week" :games="$games">
        </x-current-week>
    </div>
</x-app-layout>