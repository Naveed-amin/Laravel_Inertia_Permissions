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
                                <div class="font-bold text-xl mb-2">Users Index Page</div>
                                <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 rounded-lg">
                                    <Link :href="route('users.create')">Create New Role</Link>
                                </div>
                            </div>
                            <hr>


                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-2">#</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Email</th>
                                        <th class="px-4 py-2">Roles</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user, index) in users" :key="user.id">
                                        <td class="border px-4 py-2">{{ index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ user.name }}</td>
                                        <td class="border px-4 py-2">{{ user.email }}</td>

                                        <template v-if="user.roles && user.roles.length > 0">
                                                <td>

                                                    <template v-for="role in user.roles"
                                                        :key="role.id">
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{
                                        role.name }}</span>
                                                    </template>
                                                </td>
                                            </template>
                                            <template v-else>
                                                <td class="border px-4 py-2">
                                                    No roless defined</td>
                                            </template>
                                        <td class="border px-4 py-2">
                                            <Link :href="`users/${user.id}/edit`"
                                                class="text-green-400 hover:text-green-600">
                                            Edit</Link> |
                                            <Link :href="`users/${user.id}`" method="DELETE"
                                                class="text-red-400 hover:text-red-600">Delete</Link>
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
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

defineProps({
    users: Array,
});


const user = computed(() => page.props.auth.user)
</script>
