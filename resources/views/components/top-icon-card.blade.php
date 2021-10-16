@props(['title', 'text', 'icon'])

{{-- TODO -> check this, maybe a bit complex for what it is --}}
@php
    [$index, $trimmedTitle] = explode('. ', $title, 2);
@endphp

<div class="flex flex-col items-center mt-10 md:flex-row md:items-start">
    <img src="/img/{{ $icon }}" alt="" class="h-16 md:h-auto md:w-10">
  
    <div class="mt-4 md:mt-0 md:ml-10">
        <h4 class="text-lg font-semibold text-center capitalize md:text-left">
            <span class="hidden md:inline-block">{{ $index }}.</span>  
            {{ $trimmedTitle }}
        </h4>
        
        <p class="mt-4 font-light text-center md:text-left md:mt-2 md:text-sm text-black-light">
            {{ $text }}
        </p>
    </div>
</div>