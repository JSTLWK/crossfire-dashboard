<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import SignupForm from "@/Components/Home/SignupForm.vue";
import { ArrowRightOnRectangleIcon } from "@heroicons/vue/24/outline/index.js";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head>
        <title>Signup for the tournament!</title>
        <meta
            head-key="description"
            name="description"
            content="Ever filled like you want to beat everything in Escape From Tarkov or want to have fun? Join our recurring Tournament now!"
        />
    </Head>


    <div
        style="background-image: url('https://crossfiretournament.com/background_interchange.webp');"
        class="xl:w-screen min-h-screen bg-fixed bg-no-repeat bg-cover px-1"
    >
        <div class="max-w-[1500px] mx-auto">

            <div class="text-xl flex mr-4">
                <Link :href="route('login')" class="ml-auto flex items-center">
                    <ArrowRightOnRectangleIcon class="h-6 mr-2"/>
                    <p>Login</p>
                </Link>
            </div>


            <div class="flex mt-5">
                <div class="bg-baltic-sea-700/90 flex px-6 py-8 rounded-md text-white w-full">
                    <div class="max-w-6xl">
                        <h1 class="text-4xl font-bender uppercase">Crossfire Tournaments</h1>
                        <p class="text-xl my-4">Crossfire is your go-to platform for high-octane Escape from Tarkov
                            tournaments and events. We're here to fuel your competitive spirit and provide an arena for
                            Tarkov enthusiasts to showcase their skills. Partnering closely with Battlestate Games, we
                            offer a seamless, immersive experience that connects players directly to the heart of
                            Tarkov. Sign up today for the next tournament and dive into the action!</p>
                    </div>
                    <img src="/img/logo.png" class="hidden xl:block max-h-[200px] mx-auto" alt="Crossfire logo">

                </div>
            </div>

            <div class="xl:flex">
                <div class="bg-baltic-sea-700/90 mt-10 px-6 py-8 text-white xl:flex w-full">
                    <div class="xl:w-1/2 pr-5 xl:border-r xl:border-orange-400 flex flex-col ">
                        <div>
                            <SignupForm/>
                        </div>
                        <div class="mt-auto">
                            <h2 class="text-2xl mb-2 uppercase">Last Tournament top 3</h2>
                            <l class="list-disc pl-6">
                                <li>Team 1 "Tean name"</li>
                                <li>Team 2 "Tean name"</li>
                                <li>Team 3 "Tean name"</li>
                            </l>

                            <h2 class="text-2xl mb-2 uppercase mt-6">Current signup</h2>
                        </div>
                    </div>

                    <div class="xl:w-1/2 prose pl-6 prose-h1:text-white prose-h2:text-white prose-h3:text-white prose-h3:mt-1 prose-li:my-0 prose-p:text-white prose-h2:font-normal prose-a:text-tan-300 mt-20 xl:mt-0">
                        <h2 class="font-bender uppercase">INFORMATION</h2>
                        <p>All the information can be found in the following <a
                            href="https://docs.google.com/document/d/1J08_4s3s_Mzn3wl9mC2nDMcBYgvYdI0_hdM1uv2OuZ0/edit"
                            target="_blank"
                        >document</a>. This information is a summary of the rules</p>
                        <h3 class="font-bender uppercase">Banned Items and/or Rules</h3>
                        <ul>
                            <li>No Tier 6 armor</li>
                            <li>Gear of bosses can’t be used</li>
                            <li>No Mk-18 .338 LM or AXMC</li>
                            <li>No Thermal scopes</li>
                            <li>No VOG-25/17 or Impact Nades</li>
                            <li>No Grenade Launcher</li>
                            <li>KS-23</li>
                            <li>Only use the ammo listed.</li>
                        </ul>

                        <h3 class="font-bender uppercase">General Gameplay rules</h3>
                        <ul>
                            <li>Each team has 1 Team Leader</li>
                            <li>Each team consists of 3 players</li>
                            <li>Each team has one AR player only 1x scope</li>
                            <li>Each team has one SMG player only 1x scope</li>
                            <li>Each team has one DMR/sniper DMR 4x / sniper all scopes</li>
                            <li>Each team may bring any gun of their choice within their class</li>
                            <li>All gear except the type of weapons can be customized.</li>
                            <li>ASVAL/VSS counts as AR class</li>
                            <li>If a team member dies, the team has to wait for their team to be extracted and they will
                                go into a raid together again.
                            </li>
                        </ul>

                        <img
                            src="https://www.escapefromtarkov.com/themes/eft/images/bs_logo.png"
                            class="h-16"
                            alt="Battle state games logo"
                        >

                    </div>

                </div>
            </div>
        </div>

    </div>


</template>
