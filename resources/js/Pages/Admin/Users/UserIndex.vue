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
                            <div class="font-bold text-xl mb-2">Users Index Page</div>
                            <hr>

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-2">#</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Email</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user, index) in users" :key="user.id">
                                        <td class="border px-4 py-2">{{ index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ user.name }}</td>
                                        <td class="border px-4 py-2">{{ user.email }}</td>
                                        <td class="border px-4 py-2">Action</td>
                                    </tr>
                                </tbody>
                            </table>
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

import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

defineProps({
    users: Array,
});


const user = computed(() => page.props.auth.user)
</script>
