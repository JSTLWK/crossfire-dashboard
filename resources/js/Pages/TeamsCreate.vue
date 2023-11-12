<script setup>

import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    username: "",
    email: "",
});

const submit = () => {
    form.post(route('team.store'));
}



</script>

<template>
    <AppLayout>
        <div class="px-4 pt-6 sm:px-6 lg:px-8 dark:text-white max-w-4xl">
            <h2 class="text-xl font-bold font-bender">Add Teammate</h2>
            <p class="mb-4">Please fill in their username and email</p>
            <div class="w-full mt-5">
                <h4 class="flex items-center">Username
                    <span class="text-xs ml-auto text-red-500">{{ form.errors?.username }}</span></h4>
                <input
                    type="email"
                    v-model="form.username"
                    placeholder="Fill in your username"
                    class="w-full border ring:none outline-none  opacity-100 text-white bg-baltic-sea-800/90 rounded-sm py-1 px-2"
                    :class="form.errors?.username ? 'border-red-500' : ''"
                />
            </div>
            <div class="w-full my-5 ">
                <h4 class="flex items-center">E-mail
                    <span class="text-xs ml-auto text-red-500">{{ form.errors?.email }}</span></h4>
                <input
                    type="email"
                    v-model="form.email"
                    placeholder="E-mail"
                    class="w-full border ring:none outline-none  opacity-100 text-white bg-baltic-sea-800/90 rounded-sm py-1 px-2"
                    :class="form.errors?.email ? 'border-red-500' : ''"
                />
            </div>
            <PrimaryButton class="ml-auto" @click="submit">
                Add Team member
            </PrimaryButton>
        </div>
    </AppLayout>
</template>
