<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import Steps from "@/Components/Banners/Steps.vue";


const { auth } = usePage().props;

const user = computed(() => {
    return auth?.user.name;
});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="pl-12 py-12 pr-12">
            <div class="grid grid-cols-2">
                <div>
                    <h2 class="text-3xl font-bender">Welcome to Your Command Center, {{ user }}</h2>
                    <p class="max-w-4xl">Get ready for an adrenaline-pumping journey through the chaotic world of Reserve. This
                        is your personal battle command, where you can sign up, form your squad, and stay on top of the
                        ever-changing action. It's not just a dashboard; it's your lifeline in the wilds of Crossfire.</p>
                </div>

<!--                <div>-->
<!--                    <Steps />-->
<!--                </div>-->
            </div>
        </div>
    </AppLayout>
</template>
