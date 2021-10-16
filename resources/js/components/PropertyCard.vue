<template>
    <div class="property-card">
        <div class="property-card__image-container">
            <img :src="imageUrl" class="property-card__image" loading="lazy" alt="Property image">
        </div>

        <div class="property-card__description">
            <div class="property-card__top-row">
                <h3 class="property-card__price">
                    {{ formattedPrice }}
                </h3>
                <p class="property-card__specs">
                    {{ specs }}
                </p>
            </div>

            <div class="property-card__location">
                <h4 class="property-card__street">
                    {{ street }}
                </h4>
                <p class="property-card__city">
                    {{ city }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import { formatPrice } from '../utils.js';

    export default {
        props: {
            imageUrl: {
                type: String,
                required: true
            },
            price: {
                type: Number,
                required: true
            },
            specs: {
                type: String,
                required: true
            },
            street: {
                type: String,
                required: true
            },
            city: {
                type: String,
                required: true
            }
        },
        computed: {
            formattedPrice() {
                return formatPrice(this.price);
            }
        }
    }
</script>

<style lang="scss" scoped>
    $text-color-dark: #3B4046;
    $text-color-light: #AAA;
    $border-color: #EBEBEB;
    $background-color: #F8F8F8;

    .property-card {
        display: flex;
        flex-direction: column;
        border: 1px solid $border-color;

        &__image-container {
            flex: 1;
        }

        &__image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        &__description {
            padding: 1rem;
            font-size: 0.8rem;
            background-color: $background-color;
        }

        &__top-row {
            display: flex;
            justify-content: space-between;
        }

        &__price {
            font-size: 1.2rem;
            font-weight: bold;
            color: $text-color-dark;
        }

        &__specs {
            color: $text-color-light;
        }

        &__location {
            margin-top: 1rem;
        }

        &__street {
            color: $text-color-dark;
            font-weight: bold;
        }

        &__city {
            color: $text-color-light;
        }
    }
</style>