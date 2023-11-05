<script setup>

import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { CheckIcon } from "@heroicons/vue/24/solid/index.js";


const disableFormNewTourneyComing = ref(false);
const hasCompletedSignUp          = ref(false);
const form                        = useForm({
    email: "",
    teamName: "",
    username: "",
});

const submit = () => {
    form.post(route("signup"), {
        onSuccess: () => {
            form.reset(["email", "teamName"]);

            hasCompletedSignUp.value = true;
        }
    });
};

</script>

<template>
    <div class="flex items-start">
        <h2 class="text-3xl mb-2 font-bender uppercase">REGISTRATION FORM</h2>
        <p class="ml-auto text-red-500">Signup ends 01-01-2024</p>
    </div>
    <div v-if="! hasCompletedSignUp && ! disableFormNewTourneyComing">
        <p class="mb-4">Please ensure that only the leader signs up this form</p>

        <div class="">
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
            <div class="w-full mt-5 ">
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

            <div class="w-full mt-5">
                <h4 class="flex items-center">Team Name
                    <span class="text-xs ml-auto text-red-500">{{ form.errors?.teamName }}</span></h4>
                <input
                    type="text"
                    v-model="form.teamName"
                    placeholder="Team name can be changed later"
                    class="w-full border ring:none outline-none  opacity-100 text-white bg-baltic-sea-800/90 rounded-sm py-1 px-2"
                    :class="form.errors?.teamName ? 'border-red-500' : ''"
                />
            </div>
        </div>

        <div class="flex text-sm items-center mt-4">
            <svg
                class="h-5 mr-2"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                ></path>
            </svg>
            <p>All your information is securely saved and deleted after the tournament.</p>
        </div>

        <div class="mt-4 flex">
            <button
                class="ml-auto bg-tan-600 text-white px-3 py-4 rounded-md hover:bg-tan-500"
                @click="submit"
            >
                Sign up for latest Tournament
            </button>
        </div>
    </div>

    <div v-if="hasCompletedSignUp" class="text-center text-green-500">
        <CheckIcon class="h-20 mx-auto"/>
        <p>Thanks for using the form. <br/> Please look at your email to complete the setup.</p>
    </div>
    <div v-if="disableFormNewTourneyComing">
        Currently there no Tournament planned. The last tournament was planned on 04-11-2023
    </div>
</template>
