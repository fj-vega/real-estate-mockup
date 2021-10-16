<template>
    <div ref="dropdown" class="relative inline-block" :class="zIndex">
        <button 
            ref="trigger" 
            class="flex items-center justify-between" 
            :class="buttonClass" 
            @click="toggle()"
        >
            <span class="font-semibold" :class="colorClass">
                {{ triggerTitle }}
            </span>
            
            <span class="px-2 mr-3 text-lg font-bold" :class="colorClass">
                {{ isOpen ? '&utrif;' : '&dtrif;' }}
            </span>
        </button>
        
        <div 
            v-show="isOpen"
            class="absolute top-0 left-0 bg-white shadow-lg" 
            :class="zIndex" 
            :style="{ top }" 
        >
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        triggerTitle: {
            type: String,
            required: true
        },
        colorClass: {
            type: String,
            required: true
        },
        buttonClass: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            isOpen: false,
            top: null
        }
    },
    computed: {
        zIndex() {
            return this.isOpen ? '' : 'z-20';
        }  
    },
    watch: {
        isOpen(val, oldVal) {
            document.body[
                val ? 'addEventListener' : 'removeEventListener'
            ]('click', this.handleClickOutside);
        }
    },
    methods: {
      toggle() {
          this.isOpen = !this.isOpen;
      },
      handleClickOutside(e) {
          if (!this.$refs.dropdown.contains(e.target)) {
              this.isOpen = false;
          }
      }
    },
    mounted() {
        this.top = this.$refs.trigger.offsetHeight + 'px';
    }
}
</script>