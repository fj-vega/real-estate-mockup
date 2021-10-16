@props(['title', 'text', 'icon'])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center space-y-3']) }}>
    <h4 class="text-lg font-semibold capitalize">
        {{ $title }}
    </h4>
    
    <p class="font-light text-center">
        {{ $text }}
    </p>
    
    <img src="/img/{{ $icon }}" alt="" class="w-36">
</div>