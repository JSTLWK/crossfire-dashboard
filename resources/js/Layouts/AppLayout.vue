<script setup>
import { Head, router, usePage } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import AppSideNavbar from "@/Components/Layout/AppSideNavbar.vue";
import SignupWarning from "@/Components/Banners/SignupWarning.vue";
import { computed } from "vue";

defineProps({
    title: String,
});

const { auth } = usePage().props;

const current = (name) => route().current(name);
const isStepRoute = () => {
    return current('step.*')
}

const hasStepsNotCompleted = computed(() => {
    return auth?.user.complete_signup;
});

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100 dark:bg-baltic-sea-700 flex">
            <AppSideNavbar class="w-1/6" />

            <!-- Page Content -->
            <main class="w-5/6">
                <SignupWarning v-show="! hasStepsNotCompleted " />
                <slot />
            </main>
        </div>
    </div>
</template>
