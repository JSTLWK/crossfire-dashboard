<template>
    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-baltic-sea-700 dark:bg-baltic-sea-950 px-6">
        <div class="flex h-16 shrink-0 items-center mt-5 mb-2">
            <img
                class="h-20 w-auto"
                src="/img/logo.png"
                alt="Your Company"
            />
        </div>
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li v-for="item in navigation" :key="item.name">
                            <Link
                                :href="item.href"
                                :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']"
                            >
                                <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true"/>
                                {{ item.name }}
                                <span
                                    v-if="item.count"
                                    class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-gray-900 px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-white ring-1 ring-inset ring-gray-700"
                                    aria-hidden="true"
                                >{{ item.count }}</span>
                            </Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="text-xs font-semibold leading-6 text-gray-400">Your teammates</div>
                    <div v-if="teams.length <= 0">
                        <p>No teammates found, please invite teammates
                            <Link :href="'#'" class="text-tan-600">here</Link>
                        </p>
                    </div>
                    <ul role="list" class="-mx-2 mt-2 space-y-1">
                        <li v-for="team in teams" :key="team.name">
                            <div
                                :class="[team.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']"
                            >
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">
                                    <CheckIcon v-if="team.complete_signup" class="h-4" />
                                </span>
                                <span class="truncate">{{ team.name }}</span>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="-mx-6 mt-auto">
                    <Link
                        method="post"
                        :href="route('logout')"
                        class="flex items-center gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-white hover:bg-gray-800"
                    >
                        <span class="sr-only">Your profile</span>
                        <span aria-hidden="true">{{ user }}</span>
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script setup>
import {
    ChartPieIcon,
    DocumentDuplicateIcon,
    HomeIcon,
    UsersIcon,
    CheckIcon
} from '@heroicons/vue/24/outline';
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const { auth, currentActiveSteps } = usePage().props;

const { teamMembers: teams } = usePage().props;

const current = (name) => route().current(name);

const navigation = [
    { name: 'Dashboard', href: route('dashboard'), icon: HomeIcon, current: current('dashboard') },
    { name: 'Steps to Complete', href: route('step.first-to-complete'), count: currentActiveSteps, icon: UsersIcon, current: current('step.*') },
    { name: 'Your Team', href: route('team.index'), icon: UsersIcon, current: current('team.*') },
    { name: 'Information', href: '#', icon: DocumentDuplicateIcon, current: false },
    { name: 'Results', href: '#', icon: ChartPieIcon, current: false },
];

const user = computed(() => {
    return auth?.user.name;
});
</script>
