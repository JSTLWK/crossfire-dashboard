<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import StepsOverview from "@/Components/StepsOverview.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ArrowRightIcon } from "@heroicons/vue/24/solid/index.js";
import { useForm } from "@inertiajs/vue3";
import { ref, toRefs } from "vue";

const props = defineProps({
    currentStep: {
        type: Object,
        required: true,
    },
    allSteps: {
        type: Array,
        required: true,
    }
});

const { currentStep } = toRefs(props);
const valueInput = ref(null);

const form = useForm({
    value: '',
});

const submitStep = () => {
    form.post(route('step.store', {step: currentStep.value}), {
        onSuccess: () => {
            form.reset();

            valueInput.value.focus();

        },
    })

};
</script>

<template>
    <AppLayout :title="`Complete signup - Step ${currentStep.id}`">
        <StepsOverview
            :steps="allSteps"
            :current-step-id="currentStep.id"
        />

        <div class="max-w-7xl mx-auto mt-10">
            <h2 class="text-xl font-bold">{{ currentStep.name }}</h2>
            <p class="mb-4">{{ currentStep.description }}</p>
            <input
                ref="valueInput"
                type="text"
                v-model="form.value"
                :placeholder="`Fill in your ${currentStep.name}`"
                class="w-full border ring:none outline-none opacity-100 text-white bg-baltic-sea-800/90 rounded-sm py-1 px-2"
            >
            <PrimaryButton class="ml-auto mt-5" @click="submitStep">
                Go to Next Step
                <ArrowRightIcon class="ml-2 h-6 w-6"/>
            </PrimaryButton>
        </div>

    </AppLayout>
</template>
