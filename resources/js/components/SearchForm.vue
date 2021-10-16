<template>
    <section class="flex flex-col px-4 mt-10 md:justify-center md:py-48 md:-mt-10">
        <h1 class="text-3xl font-semibold text-center capitalize">
            Property search
        </h1>

        <form 
            class="flex flex-col pt-6 mt-10 space-y-4 bg-gray-100 rounded-lg md:w-autoflex md:flex-row md:space-y-0 md:items-center md:space-x-4 md:mx-auto section-container section-container--lg"
            @submit.prevent="search"
        >
            <select v-model="country" class="flex-1 py-3 bg-gray-100 border-b-2 border-solid border-brand-main">
                <option value="all">All countries</option>
                <option value="ireland">Ireland</option>
            </select>

            <select 
                v-model="city" 
                :disabled="!cityAllowed" 
                class="flex-1 py-3 bg-gray-100 border-b-2 border-solid border-brand-main"
            >
                <option value="">Select a country first</option>
                <option value="dublin">Dublin</option>
                <option value="castlebar">Castlebar</option>
            </select>

            <select v-model="maxPrice" class="flex-1 py-3 bg-gray-100 border-b-2 border-solid border-brand-main">
                <option value="">No max price</option>
                <option v-for="option in maxPriceOptions" :value="option.value" :key="option.value">
                    {{ option.text }}
                </option>
            </select>

            <button class="px-8 py-2 font-semibold text-center text-white rounded md bg-brand-main">
                Search 
            </button>
        </form>

        <div class="mt-20">
            <p v-if="properties && properties.length === 0">
                There are no results that match your query
            </p>
            
            <div v-else-if="properties" class="grid grid-cols-1 gap-8 md:grid-cols-2 section-container section-container--lg">
                <PropertyCard 
                    v-for="property in properties" 
                    :key="property.id"
                    :imageUrl="`/img/listing-${property.id}.jpg`"
                    :price="property.price"
                    :specs="property.specs"
                    :street="property.street"
                    :city="property.city" />
            </div>
        </div>
    </section>
</template>

<script>
    import PropertyCard from './PropertyCard.vue';
    import { formatPrice, buildQuery } from '../utils.js';

    export default {
        components: {
          PropertyCard  
        },
        data() {
            return {
                country: 'all',
                city: '',
                maxPrice: '',
                maxPriceOptions: [
                    { text: formatPrice(100000), value: 1 },
                    { text: formatPrice(250000), value: 2 },
                    { text: formatPrice(500000), value: 3 },
                    { text: formatPrice(1000000), value: 4 }
                ],
                properties: ''
            }
        },
        computed: {
            cityAllowed() {
                return this.country !== 'all';
            }
        },
        watch: {
            country(val, oldVal) {
                if (val === 'all') {
                    this.city = '';
                }
            }
        },
        methods: {
            getQueryUrl() {
                return buildQuery('../api/properties.json', {
                    country: this.country,
                    city: this.city,
                    maxPrice: this.maxPrice
                });
            },
            // Simulating a fetch request using static data
            async search() {
                try {
                    const resp = await window.fetch(this.getQueryUrl());
                    
                    if (resp.ok) {
                        const data = await resp.json();
                        this.properties = data;
                    }
                } catch(error) {
                    console.error(error);
                    this.searchResult = 'There was an error communicating with the database, try again later';
                }
            }
        }
    }
</script>
