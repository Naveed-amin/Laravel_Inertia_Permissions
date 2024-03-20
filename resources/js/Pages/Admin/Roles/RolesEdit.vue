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
                            <div class="font-bold text-xl mb-2">Role Update Page</div>
                            <hr>
                            <form class="max-w-sm mx-auto bg-dark" @submit.prevent="submit">
                                <div class="mb-5">
                                    <label for="role_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitedark:text-gray-400">Role
                                        Name</label>
                                    <input type="text" id="role_name" v-model="form.name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    <div v-if="form.errors.name">{{ form.errors.name }}</div>
                                </div>

                                <div class="mb-5">
                                    <label for="permissions_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitedark:text-gray-400">Permissions</label>

                                </div>
                                <div v-for="permission in permissions" :key="permission.id">
                                    <input type="checkbox"  v-model="form.permissions[permission.name]" />
                                    <label for="checkbox">{{ permission.name }}</label>
                                </div>

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
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
import { defineProps } from 'vue';
import { computed } from 'vue'
import { onMounted } from "vue";
import { usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'



const page = usePage()

const props = defineProps({
    role: {
        type: Object,
        required: true,
    },
    permissions: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    name: props.role.name,
    permissions: {},
})

function submit() {
    router.put(`/roles/${props.role.id}`, form)
}

// onMounted(() => {
//     form.name = props.role.name;
// });

// const user = computed(() => form.name)
</script>


