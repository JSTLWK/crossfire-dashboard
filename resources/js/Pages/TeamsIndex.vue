<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";

defineProps({
    teamMembers: {
        type: Array,
        required: true,
    }
});

const { teamMembers: people } = usePage().props;


</script>

<template>
    <AppLayout>
        <div class="px-4 pt-6 sm:px-6 lg:px-8 dark:text-white">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Team members</h1>
                    <p class="mt-2  text-gray-700 dark:text-white">A list of all your team members. You can only add them, neither remove or edit them. Maximum of 2 team mates.</p>
                </div>
                <div
                    class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none"
                    v-if="teamMembers.length < 3"
                >
                    <Link
                        as="button"
                        :href="route('team.create')"
                        class="block rounded-md bg-tan-600 px-3 py-2 text-center  font-semibold text-white shadow-sm hover:bg-tan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-tan-600"
                    >Add Team member
                    </Link>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th
                                    scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left  font-semibold text-gray-900 dark:text-white sm:pl-0"
                                >Name
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left  font-semibold text-gray-900 dark:text-white">Title</th>
                                <th scope="col" class="px-3 py-3.5 text-left  font-semibold text-gray-900 dark:text-white">Email</th>
                                <th scope="col" class="px-3 py-3.5 text-left  font-semibold text-gray-900 dark:text-white">Has completed signup</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <tr v-for="person in people" :key="person.email">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3  font-medium text-gray-900 dark:text-white sm:pl-0">
                                    {{ person.name }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4  text-gray-500 dark:text-white">{{ person.name }}</td>
                                <td class="whitespace-nowrap px-3 py-4  text-gray-500 dark:text-white">{{ person.email }}</td>
                                <td class="whitespace-nowrap px-3 py-4  text-gray-500 dark:text-white">{{ person.complete_signup }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
