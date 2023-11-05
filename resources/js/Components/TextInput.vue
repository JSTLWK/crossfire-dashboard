<script setup>
import { onMounted, ref } from "vue";

defineProps({
    modelValue: String,
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="block w-full rounded-md border-0 dark:bg-baltic-sea-800 border-white py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:dark:text-white text-gray-400 dark:text-white focus:ring-2 focus:ring-inset focus:ring-tan-600 sm:text-sm sm:leading-6"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
