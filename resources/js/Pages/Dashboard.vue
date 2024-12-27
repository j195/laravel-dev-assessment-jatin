<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
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
                    <div v-for="(item, index) in jobs"
                    :key="index" class="bg-white-100 col-span-4">{{ item.title }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

