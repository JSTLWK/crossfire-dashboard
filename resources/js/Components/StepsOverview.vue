<script setup>
import { CheckIcon } from "@heroicons/vue/24/solid/index.js";
import { computed, toRefs } from "vue";

const props = defineProps({
    currentStepId: {
        type: Number,
        required: true,
    },
    steps: {
        type: Array,
        required: true,
    }
});

const { currentStepId, steps } = toRefs(props);

const resolvedStep = computed(() => {
    const result = [];

    steps.value?.forEach((step) => {
        let status = 'to-do';

        if (step.id === currentStepId.value) {
            status = 'current';
        } else if (step.id < currentStepId.value) {
            status = 'complete';
        }

        result.push({
            status: status,
            ...step,
        });
    });

    return result;
});

</script>

<template>
    <div class="lg:border-b lg:border-t lg:border-gray-100">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
            <ol role="list" class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-100">
                <li v-for="(step, stepIdx) in resolvedStep" :key="step.id" class="relative overflow-hidden lg:flex-1">
                    <div :class="[stepIdx === 0 ? 'rounded-t-md border-b-0' : '', stepIdx === steps.length - 1 ? 'rounded-b-md border-t-0' : '', 'overflow-hidden border border-gray-100 lg:border-0']">
                        <a v-if="step.status === 'complete'" :href="step.href" class="group">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent  lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true" />
                            <span :class="[stepIdx !== 0 ? 'lg:pl-9' : '', 'flex items-center px-6 py-5 text font-medium']">
                            <span class="flex-shrink-0">
                              <span class="flex h-10 w-10 items-center justify-center rounded-full bg-tan-600">
                                <CheckIcon class="h-6 w-6 text-white" aria-hidden="true" />
                              </span>
                            </span>
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col items-center">
                              <span class="text-xl font-bold">{{ step.name }}</span>
<!--                              <span class="text font-medium text-white">{{ step.description }}</span>-->
                            </span>
                          </span>
                        </a>
                        <a v-else-if="step.status === 'current'" :href="step.href" aria-current="step">
                            <span class="absolute left-0 top-0 h-full w-1 bg-tan-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true" />
                            <span :class="[stepIdx !== 0 ? 'lg:pl-9' : '', 'flex items-center px-6 py-5 text font-medium']">
                <span class="flex-shrink-0">
                  <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-tan-600">
                    <span class="text-tan-600">{{ step.id }}</span>
                  </span>
                </span>
                <span class="ml-4 mt-0.5 flex min-w-0 flex-col items-center">
                  <span class="text-xl text-tan-600 font-bold">{{ step.name }}</span>
<!--                  <span class="text font-medium text-white">{{ step.description }}</span>-->
                </span>
              </span>
                        </a>
                        <a v-else :href="step.href" class="group">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true" />
                            <span :class="[stepIdx !== 0 ? 'lg:pl-9' : '', 'flex items-center px-6 py-5 text font-medium']">
                        <span class="flex-shrink-0">
                          <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-200">
                            <span class="text-white">{{ step.id }}</span>
                          </span>
                        </span>
                <span class="ml-4 mt-0.5 flex min-w-0 flex-col items-center">
                  <span class="text-xl text-white font-bold">{{ step.name }}</span>
<!--                  <span class="text font-medium text-white">{{ step.description }}</span>-->
                </span>
              </span>
                        </a>
                        <template v-if="stepIdx !== 0">
                            <!-- Separator -->
                            <div class="absolute inset-0 left-0 top-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-200" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </template>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</template>

<style scoped>

</style>
