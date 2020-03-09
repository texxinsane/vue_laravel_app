<template>
    <div class="flights">
        <div class="flex flex-wrap">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 bg-gray-500">x</div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 bg-gray-400"></div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 bg-gray-500"></div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 bg-gray-400"></div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/2 xl:w-1/6 mb-4 bg-gray-500"></div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/2 xl:w-1/6 mb-4 bg-gray-400"></div>
        </div>

    </div>
</template>

<script>
    export default {
        computed: {
            image() {
                // return `/images/${this.color}.png`;
                // return 'https://via.placeholder.com/150';
            }
        },
        methods: {
            getFlights() {
                this.$emit('getFlights', this.id, val.target.selectedOptions[0].value);
            }
        },

    }
</script>