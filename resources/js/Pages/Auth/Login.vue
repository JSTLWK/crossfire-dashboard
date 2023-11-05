<script setup>
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import { computed, onMounted, ref, toRef, toRefs, watch } from "vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const randomImageNumber = ref(1);
const clickLogo         = ref(0);

watch(clickLogo, (newValue) => {
    if (newValue % 5 === 0) {
        randomizeImage();
    }
});

onMounted(() => {
    randomizeImage;
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};

const randomizeImage = () => {
    const randomItems       = [1, 2, 3, 4];
    randomImageNumber.value = randomItems[Math.floor(Math.random() * randomItems.length)];
};

const randomImage = computed(() => {
    randomizeImage();
    return `/img/bg_${randomImageNumber.value}.webp`;
});
</script>

<template>
    <div class="flex h-full min-h-full flex-1">
        <div
            class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24"
        >
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img
                        class="h-24 w-auto"
                        src="/img/logo.png"
                        alt="Crossfire Tournament"
                        @click="clickLogo++"
                    />
                    <h2
                        class="mt-8 text-2xl font-bold leading-9 tracking-tight dark:text-white text-gray-900"
                    >
                        Sign in to your account
                    </h2>
                    <p
                        class="mt-2 text-sm leading-6 dark:text-white text-gray-500"
                    >
                        Not a member?
                        {{ " " }}
                        <Link
                            :href="route('home')"
                            class="font-semibold text-tan-600 hover:text-tan-500"
                        >Signup using the form on the homepage</Link
                        >
                    </p>
                </div>

                <div class="mt-10">
                    <div>
                        <div class="space-y-6">
                            <div>
                                <label
                                    for="email"
                                    class="block text-sm font-medium leading-6 dark:text-white text-gray-900"
                                >Email address</label
                                >
                                <div class="mt-2">
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        v-model="form.email"
                                        autocomplete="email"
                                        required=""
                                        class="block w-full rounded-md border-0 dark:bg-baltic-sea-800 border-white py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:dark:text-white placeholder:text-gray-400 dark:text-white focus:ring-2 focus:ring-inset focus:ring-tan-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>

                            <div>
                                <label
                                    for="password"
                                    class="block text-sm font-medium leading-6 dark:text-white text-gray-900"
                                >Password</label
                                >
                                <div class="mt-2">
                                    <input
                                        id="password"
                                        name="password"
                                        v-model="form.password"
                                        type="password"
                                        autocomplete="current-password"
                                        required=""
                                        class="block w-full rounded-md border-0 dark:bg-baltic-sea-800 border-white py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:dark:text-white text-gray-400 dark:text-white focus:ring-2 focus:ring-inset focus:ring-tan-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input
                                        id="remember-me"
                                        name="remember-me"
                                        type="checkbox"
                                        v-model="form.remember"
                                        class="h-4 w-4 rounded border-gray-300 text-tan-600 focus:ring-tan-600"
                                    />
                                    <label
                                        for="remember-me"
                                        class="ml-3 block text-sm leading-6 dark:text-white text-gray-700"
                                    >Remember me</label
                                    >
                                </div>

                                <div class="text-sm leading-6">
                                    <Link
                                        :href="route('password.request')"
                                        class="font-semibold text-tan-600 hover:text-tan-500"
                                    >Forgot password?</Link
                                    >
                                </div>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    @click="submit"
                                    class="flex w-full justify-center rounded-md bg-tan-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-tan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-tan-600"
                                >
                                    Sign in
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img
                class="absolute inset-0 h-full w-full object-cover"
                :src="randomImage"
                alt=""
            />
        </div>
    </div>
</template>
