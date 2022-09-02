@props(['height'])

<img src="{{ url('/images/logo_200x200.png') }}" {{ $attributes->merge(['class' => $height]) }} />
