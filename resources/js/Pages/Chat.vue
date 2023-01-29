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
                            <li
                                @click="() => {loadMessages(user.id)}"
                                v-for="user in users" :key="user.id"
                                class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-200 hover:cursor-pointer"
                            >
                                <p class="flex items-center">
                                    {{ user.name }}
                                    <span class="ml-2 w-2 h-2 bg-blue-500 rounded-full"></span>
                                </p>
                            </li>
                        </ul>
                    </div>

                    <!-- Box Send Messages -->
                    <div class="flex flex-col justify-between" style="width: 85%">
                        <div class="w-full p-6 flex flex-col overflow-y-auto">
                            <div
                                v-for="message in messages" :key="message.id"
                                :class="message.from == $page.props.user.id ? 'text-right' : ''"
                                class="w-full mb-3">
                                <p
                                    :class="message.from == $page.props.user.id ? 'messageFromMe' : 'messageToMe'"
                                    class="inline-block p-2 rounded-md" style="max-width: 75%;">
                                    {{ message.content }}
                                </p>
                                <span class="block mt-1 text-xs text-gray-500">{{ message.created_at }}</span>
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
    import moment from "moment/moment";

    export default  {
        filters: {
            formatDate: function (value) {
                if (value){
                    return moment(value).format('DD/MM/YYY HH:mm');
                }

            }
        },
        components: {
            AppLayout,
        },
        data() {
            return {
                users: [],
                messages: []
            }
        },
        methods: {
            loadMessages: function (userId){
                axios.get(`api/messages/${auth_id}/${userId}`).then(response => {
                    this.messages = response.data.messages;
                })
            }
        },
        mounted() {
            axios.get('api/users/'+ auth_id).then(response => {
                this.users = response.data.users;
            })
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
