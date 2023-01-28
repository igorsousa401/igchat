<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import '../../css/chat.css'
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex" style="height: 400px;">

                    <!-- list users and messages -->
                    <div class="bg-gray-200 bg-opacity-25 border-gray-200 overflow-y-auto" style="width: 25%">
                        <ul>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-200 hover:cursor-pointer">
                                <p class="flex items-center">
                                    Anna Kelly
                                    <span class="ml-2 w-2 h-2 bg-blue-500 rounded-full"></span>
                                </p>
                            </li>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-200 hover:cursor-pointer">
                                <p class="flex items-center">
                                    Carlos Júnior
                                    <span class="ml-2 w-2 h-2 bg-blue-500 rounded-full"></span>
                                </p >
                            </li>
                        </ul>
                    </div>

                    <!-- Box Send Messages -->
                    <div class="flex flex-col justify-between" style="width: 85%">
                        <div class="w-full p-6 flex flex-col overflow-y-auto">
                            <div class="w-full mb-3 text-right">
                                <p class="inline-block p-2 rounded-md messageFromMe" style="max-width: 75%;">
                                    Olá!!
                                </p>
                                <span class="block mt-1 text-xs text-gray-500">27/01/2023 12:10</span>
                            </div>
                            <div class="w-full mb-3">
                                <p class="inline-block p-2 rounded-md messageToMe" style="max-width: 75%;">
                                    Oi!!
                                </p>
                                <span class="block mt-1 text-xs text-gray-500">27/01/2023 12:10</span>
                            </div>
                        </div>

                        <div class="w-full bg-gray-200 p-6 bg-opacity-25 border-t border-gray-200">
                            <form>
                                <div class="flex rounded-md overflow-hidden border border-gray-300">
                                    <input type="text" class="flex-1 px-4 py-2 text-sm border-none focus:ring-0"/>
                                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    export default  {
        components: {
            AppLayout,
        },
        data() {
            return {
                users: []
            }
        },
        mounted() {
            axios.get('api/users',{ withCredentials: true }).then(response => {
                console.log(response);
            })
        }
        }
    }
</script>

<style>
    .messageFromMe{
        @apply bg-indigo-300 bg-opacity-25;
    }

    .messageToMe{
        @apply bg-gray-300 bg-opacity-25;
    }
</style>
