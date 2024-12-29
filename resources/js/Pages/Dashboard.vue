<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TimeAgo from '@/Components/TimeAgo.vue';
defineProps({
    jobs: Object
});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <!-- TODO: Add job list here -->

                <div class="grid grid-flow-col gap-3">
                <div v-for="(job, index) in jobs"
                    :key="index" class="bg-white-100 col-span-4">

                    <div class="m-5">
                    <div class="group mx-2 mt-10 grid max-w-screen-md grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-8 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
                    <a href="#" class="order-2 col-span-1 mt-4 -ml-14 text-left text-gray-600 hover:text-gray-700 sm:-order-1 sm:ml-4">
                    <div class="group relative h-16 w-16 overflow-hidden rounded-lg">
                        <img :src="'storage/'+job.logo" alt="" class="h-full w-full object-cover text-gray-700" />
                    </div>
                    </a>
                    <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
                        <div  class="col-span-8 flex justify-end">
                        <span v-for="(extra, extra_index) in job?.extra_info"
                        :key="extra_index" class="rounded-full bg-black px-2 py-0.5 text-white">{{extra}}</span>
                    </div>
                    <a href="#" class="mb-1 overflow-hidden pr-7 text-lg font-semibold sm:text-xl"> {{job.title}} </a>
                    <h3 class="text-sm text-gray-600 mb-2">{{ job.company_name }} Technologies Pvt. Ltd.</h3>
                    <p class="overflow-hidden pr-7 text-sm whitespace-nowrap">{{ job.description && job.description.length < 57 ? job.description : job.description.substring(0,57)+" ..."  }}</p>
                    </div>
                    <div class="col-span-9"></div><div class="col-span-3 mt-2"><span class="text-sm text-gray-600 mb-2"><time-ago :dateTime='job.created_at'/></span></div>
                </div>
                </div>

                </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

