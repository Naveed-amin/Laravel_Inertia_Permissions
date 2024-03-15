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
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-bold text-xl">Roles Index Page</h3>
                                <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 rounded-lg">
                                    <Link :href="route('permissions.create')">Create New Permission</Link>
                                </div>
                            </div>
                            <hr>

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-2">#</th>
                                        <th class="px-4 py-2">Name</th>
                                        <!-- <th class="px-4 py-2">Email</th> -->

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(permission, index) in permissions" :key="permission.id">
                                        <td class="border px-4 py-2">{{ index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ permission.name }}</td>
                                        <!-- <td class="border px-4 py-2">{{ role.email }}</td> -->

                                            <td class="border px-4 py-2">
                                                <Link :href="`permissions/${permission.id}/edit`" class="text-green-400 hover:text-green-600">Edit</Link> |
                                                <Link :href="`permissions/${permission.id}`" method="DELETE" class="text-red-400 hover:text-red-600">Delete</Link>
                                            </td>

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
import { Head,Link } from '@inertiajs/vue3';

import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
defineProps(['permissions'])

const user = computed(() => page.props.auth.user)
</script>
