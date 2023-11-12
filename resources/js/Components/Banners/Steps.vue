<template>
    <div class="text-right">
        <h2 class="text-2xl mb-4 font-bold font-bender">Steps to complete the signup</h2>
        <div class="" aria-label="Progress">
            <ol role="list" class="space-y-6">
                <li v-for="step in steps" :key="step.name">
                    <div v-if="step.status === 'complete'" :href="step.href" class="group">
                        <span class="flex items-center flex-row-reverse">
                          <span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center">
                            <CheckCircleIcon
                                class="h-full w-full text-tan-600 group-hover:text-tan-800 "
                                aria-hidden="true"
                            />
                          </span>
                          <span class="mr-3 text-md font-medium text-gray-500 dark:text-white">
                              {{ step.name }}
                          </span>
                        </span>
                    </div>
                    <Link
                        v-else-if="step.status === 'current'"
                        :href="step.href"
                        class="flex items-center flex-row-reverse"
                        aria-current="step"
                    >
                        <span
                            class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center"
                            aria-hidden="true"
                        >
                          <span class="absolute h-4 w-4 rounded-full bg-tan-200"/>
                          <span class="relative block h-2 w-2 rounded-full bg-tan-600"/>
                                </span>
                        <span class="mr-3 text-xl font-medium text-tan-600 group-hover:text-gray-200 dark:group-hover:text-gray-100">{{
                                step.name
                            }}</span>
                    </Link>
                    <div v-else :href="step.href" class="group">
                        <div class="flex items-center flex-row-reverse">
                            <div
                                class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center"
                                aria-hidden="true"
                            >
                                <div class="h-2 w-2 rounded-full bg-gray-300 dark:bg-white group-hover:bg-gray-400 dark:group-hover:bg-white"/>
                            </div>
                            <p class="mr-3 text-md font-medium text-gray-500 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white">
                                {{ step.name }}</p>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>

<script setup>
import { CheckCircleIcon } from '@heroicons/vue/20/solid';
import { Link } from "@inertiajs/vue3";

const steps = [
    { name: 'Create account', href: '#', status: 'complete' },
    { name: 'Invite Teammates', href: '#', status: 'current' },
    { name: 'Briefing about tournament', href: '#', status: 'upcoming' },
    { name: 'Social information', href: '#', status: 'upcoming' },
    { name: 'Setup Twitch Account and settings', href: '#', status: 'upcoming' },
];
</script>
