<template>
    <div 
        class="fixed top-0 left-0 z-10 w-full border-b-2 border-solid" 
        :class="[backgroundColor, mainBorderColor]"
    >
        <div class="flex items-center px-4 py-3 mx-auto section-container section-container--xl">
            <a href="/" class="w-8 h-8">
                <img :src="logo" class="w-full h-full" alt="Moovingo logo">
            </a>

            <div class="flex items-center ml-auto">
                <button 
                    class="px-3 py-2 ml-auto text-white bg-transparent border border-solid rounded"
                    :class="[textColor, buttonBorderColor]"
                >
                    Browse Listings 
                </button>

                <button class="flex flex-col ml-5 space-y-1" @click="showMenu = true">
                    <span class="w-5 h-0.5" :class="hamburgerColor"></span>
                    <span class="w-5 h-0.5" :class="hamburgerColor"></span>
                    <span class="w-5 h-0.5" :class="hamburgerColor"></span>
                </button>

                <div 
                    class="fixed top-0 right-0 z-20 flex w-screen h-screen p-8 overflow-y-auto transition-transform bg-white transform-gpu"
                    :class="{ 'translate-x-full': !showMenu }"    
                >
                    <button class="absolute h-10 px-4 text-3xl bg-white top-3 right-2" @click="showMenu = false">
                        &times;
                    </button>

                    <div class="text-black">
                        Mobile navbar menu content
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        logo: {
            type: String,
            required: true,
        },
        backgroundColor: {
            type: String,
            required: true,
        },
        mainBorderColor: {
            type: String,
            required: true,
        },
        textColor: {
            type: String,
            required: true,
        },
        buttonBorderColor: {
            type: String,
            required: true,
        },
        hamburgerColor: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            showMenu: false
        }
    }
}
</script>
