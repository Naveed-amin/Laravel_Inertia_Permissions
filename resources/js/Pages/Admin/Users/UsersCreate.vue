<template>

    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-sm w-full lg:max-w-full lg:flex">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">User Ceate Page</div>
                            <hr>


                            <form class="max-w-sm mx-auto bg-dark" @submit.prevent="form.post('/users')">
                                <div class="mb-5">
                                    <label for="user_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitedark:text-gray-400">User
                                        Name</label>
                                    <input type="text" id="user_name" v-model="form.name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    <div v-if="form.errors.name">{{ form.errors.name }}</div>
                                </div>
                                <div class="mb-5">
                                    <label for="user_email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitedark:text-gray-400">User
                                        Email</label>
                                    <input type="email" id="user_email" v-model="form.email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    <div v-if="form.errors.email">{{ form.errors.email }}</div>
                                </div>
                                <div class="mb-5">
                                    <label for="user_password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitedark:text-gray-400">User
                                        Password</label>
                                    <input type="password" id="user_password" v-model="form.password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    <div v-if="form.errors.password">{{ form.errors.password }}</div>
                                </div>

                                <div v-for="role in roles" :key="role.id">
                                    <input type="checkbox" v-model="form.roles[role.name]" />
                                    <label for="checkbox">{{ role.name }}</label>
                                </div>

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>


<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const form = useForm({
    name: null,
    email: null,
    password: null,
    roles: {},
})

const props = defineProps({
    roles: {
        type: Array,
        required: true,
    },
})


const user = computed(() => page.props.auth.user)
</script>
