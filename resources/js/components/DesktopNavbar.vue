<template>
    <div class="flex items-center px-4 py-3 mx-auto section-container section-container--xl">
        <a href="/" class="h-8 mr-4">
            <img :src="logo" class="w-full h-full" alt="Moovingo logo">
        </a>
        
        <div class="ml-auto">
            <button class="px-4 py-2 mr-4 font-semibold text-center text-white capitalize rounded md bg-brand-main">
                Book free valuation
            </button>
            
            <a 
                href="/search" 
                class="px-4 py-2 font-semibold text-center capitalize bg-transparent"
                :class="textColor"
            >
                Browse listings
            </a>
            
            <Dropdown 
                trigger-title="Our fees" 
                button-class="px-4 py-2 font-semibold text-center capitalize bg-transparent" 
                :color-class="textColor"
            >
                <div class="p-4">Our fees dropdown content</div>
            </Dropdown>

            <Dropdown 
                trigger-title="Selling" 
                button-class="px-4 py-2 font-semibold text-center capitalize bg-transparent" 
                :color-class="textColor"
            >
                <div class="p-4">Selling dropdown content</div>
            </Dropdown>
            
            <a 
                href="/" 
                class="px-4 py-2 font-semibold text-center capitalize bg-transparent"
                :class="textColor"
            >
                More
            </a>
            
            <a 
                href="tel:015169999" 
                class="px-4 py-2 font-semibold text-center capitalize bg-transparent"
                :class="textColor"
            >
                01 5169999
            </a>

            <a href="#" class="px-8 py-2 font-semibold text-center text-white capitalize rounded-md bg-brand-main">
                Login
            </a>
        </div>
    </div>
</template>

<script>
import Dropdown from './Dropdown.vue';

export default {
    components: {
        Dropdown  
    },
    props: {
        logo: {
            type: String,
            required: true,
        },
        textColor: {
            type: String,
            required: true,
        }
    }
}
</script>