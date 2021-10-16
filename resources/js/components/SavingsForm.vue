<template>
    <div>
        <h3 class="text-2xl font-semibold text-center capitalize">
            How much can I save?
        </h3>

        <div class="flex flex-col mt-8 space-y-12">
            <label class="font-semibold capitalize" for="selling-price">
                Selling price
            </label>
            
            <Slider 
                v-model="sellingPrice" 
                :min="1500"
                :max="4901500"
                :step="500"
                :format="formatSellingPrice" 
                class="slider--brand-color" />
        </div>

        <div class="flex flex-col mt-8 space-y-12">
            <label class="font-semibold capitalize" for="estate-agent-fee">
                Estate agent fee
            </label>

            <Slider 
                v-model="estateAgentFee" 
                :min="0"
                :max="3"
                :step="0.1"
                :format="formatEstateAgentFee" 
                class="slider--brand-color" />
        </div>

        <div class="flex justify-between mt-8">
            <p class="font-semibold capitalize">
                Agents Fee {{ agentsFeePrice }}
            </p>
            <p class="font-semibold">
                Moovingo {{ moovingoPrice }}
            </p>
        </div>

        <div class="w-full py-2 mt-8 font-semibold text-center text-white rounded bg-brand-main">
            <p class="text-lg font-semibold text-white capitalize">
                You save
            </p>
            <p class="text-3xl font-semibold text-white">
                {{ savings }}
            </p>
        </div>

        <p class="mt-4 text-xs text-center text-gray-800">
            Fees inclusive of marketing, viewings and VAT
        </p>
    </div>
</template>

<script>
  import Slider from '@vueform/slider';
  import { formatPrice } from '../utils.js';

  export default {
    components: {
      Slider
    },
    data() {
        return {
            sellingPrice: 2450000,
            estateAgentFee: 1.5,
            moovingoFee: 0.08979591836734693
        }
    },
    computed: {
        agentsFee() {
            return Math.round(this.sellingPrice * (this.estateAgentFee / 100));
        },
        moovingo() {
            return Math.round(this.sellingPrice * (this.moovingoFee / 100));
        },
        agentsFeePrice() {
            return formatPrice(this.agentsFee);
        },
        moovingoPrice() {
            return formatPrice(this.moovingo);
        },
        savings() {
            return formatPrice(this.agentsFee - this.moovingo);
        }
    },
    methods: {
        formatSellingPrice(value) {
            return formatPrice(Math.round(value));
        },
        formatEstateAgentFee(value) {
            return `%${value.toFixed(1).replace('.0', '')}`;
        }
    }
  }
</script>

<style src="@vueform/slider/themes/default.css"></style>
<style lang="scss" scoped>
    .slider--brand-color {
        --slider-bg: #E5E7EB;
        --slider-connect-bg:#0FCCD8;
        --slider-handle-bg: #0FCCD8;
        --slider-tooltip-bg: #0FCCD8;
        --slider-height: 4px;
    }
</style>