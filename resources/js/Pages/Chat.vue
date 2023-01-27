<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Chat">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                IG Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex" style="min-height: 400px;">

                    <!-- list users and messages -->
                    <div class="bg-gray-200 bg-opacity-25 border-gray-200" style="width: 25%">
                        <ul>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-200 hover:cursor-pointer">
                                <p>Anna Kelly</p>
                            </li>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-200 hover:cursor-pointer">
                                <p>Carlos Júnior</p>
                            </li>
                        </ul>
                    </div>

                    <!-- Box Send Messages -->
                    <div class="" style="width: 85%">

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
