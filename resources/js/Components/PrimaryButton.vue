<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="flex justify-center rounded-md bg-tan-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-tan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-tan-600"
    >
        <slot />
    </button>
</template>
