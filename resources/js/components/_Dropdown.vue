<!--
Unused Dropdown component
Same functionality but built using the Composition API
Only for demonstrational purpose
-->
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
import { toRefs, ref, computed, watch, onMounted } from 'vue';

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
    setup(props) {
        const { triggerTittle, colorClass, buttonClass } = toRefs(props);
        const trigger = ref(null);

        const isOpen = ref(false);
        const toggle = () => isOpen.value = !isOpen.value;
        const handleClickOutside = e => {
            if (!trigger.value.contains(e.target)) {
                isOpen.value = false;
            }
        }
        watch(isOpen, (isOpen, prevIsOpen) => {
            document.body[
                isOpen ? 'addEventListener' : 'removeEventListener'
            ]('click', handleClickOutside);
        })
        
        const zIndex = computed(() => isOpen.value ? '' : 'z-20');

        const top = ref(null);
        onMounted(() => top.value = trigger.value.offsetHeight + 'px');

        return {
            trigger,
            triggerTittle,
            colorClass,
            buttonClass,
            isOpen,
            toggle,
            zIndex,
            top
        }
    }
}
</script>