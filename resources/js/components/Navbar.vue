<template>
    <div 
        class="fixed top-0 left-0 z-10 w-full border-b-2 border-solid" 
        :class="[backgroundColor, mainBorderColor]"
    >
        <MobileNavbar 
            v-if="isMobile" 
            :logo="logo" 
            :background-color="backgroundColor" 
            :main-border-color="mainBorderColor" 
            :text-color="textColor" 
            :button-border-color="buttonBorderColor" 
            :hamburger-color="hamburgerColor" />
            
        <DesktopNavbar 
            v-else 
            :logo="logo" 
            :text-color="textColor" />
    </div>
</template>

<script>
import throttle from 'lodash.throttle';
import MobileNavbar from './MobileNavbar.vue';
import DesktopNavbar from './DesktopNavbar.vue';

export default {
    components: {
        MobileNavbar,
        DesktopNavbar
    },
    props: {
        color: {
            type: String,
            default: 'transparent'
        },
        watchScroll: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            mql: window.matchMedia('(max-width:768px)'),
            isMobile: null,
            scrollAtTop : true
        }
    },
    computed: {
        transparentAtTop() {
            return this.color === 'transparent' && this.scrollAtTop;
        },
        mainBorderColor() {
            return this.transparentAtTop ? 'border-transparent' : 'border-gray-200';
        },
        backgroundColor() {
            return this.transparentAtTop ? 'bg-transparent' : 'bg-white';
        },
        textColor() {
            return this.transparentAtTop ? 'text-white' : 'text-black-light';
        },
        buttonBorderColor() {
            return this.transparentAtTop ? 'border-white' : 'border-black-light';
        },
        hamburgerColor() {
            return this.transparentAtTop ? 'bg-white' : 'bg-black-light';
        },
        logo() {
            const name = this.isMobile ? 'logo-icon' : 'logo';
            const color = this.transparentAtTop ? 'white' : 'brand-color';
            return `/img/${name}-${color}.svg`; 
        }
    },
    methods: {
        handleScroll(e) {
            this.scrollAtTop = window.scrollY === 0;
        },
        checkMobile() {
            this.isMobile = this.mql.matches;
        }
    },
    mounted() {
        if (this.color === 'transparent') {
            this.throttledHandleScroll = throttle(this.handleScroll, 50);
            window.addEventListener('scroll', this.throttledHandleScroll);
        }

        this.checkMobile();
        this.mql.addEventListener('change', this.checkMobile);
    },
    destroyed() {
        if (this.color === 'transparent') {
            window.removeEventListener('scroll', this.throttledHandleScroll);
        }
    }
}
</script>
