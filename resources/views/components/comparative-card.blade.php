@props(['title', 'moovingoText', 'agentText', 'icon'])

<div class="py-10 border-b border-gray-200 border-solid comparative-card">
    <div class="comparative-card__body">
        <h3 class="text-xl font-semibold text-center capitalize">
            {{ $title }}
        </h3>

        <div class="flex flex-col items-center px-4 mt-4 md:flex-row md:justify-between">
            <h4 class="mt-3 text-lg font-semibold md:hidden">
                Moovingo
            </h4>
            <p class="mt-3 font-light text-center md:flex-1 md:text-sm">
                {{ $moovingoText }}
            </p>
            
            <img src="/img/{{ $icon }}" alt="" class="w-16 my-6 md:mx-24 md:flex-0">
    
            <h4 class="text-lg font-semibold capitalize md:hidden">
                Traditional agent
            </h4>
            <p class="mt-3 font-light text-center md:flex-1 md:text-sm">
                {{ $agentText }}
            </p>
        </div>
    </div>
</div>