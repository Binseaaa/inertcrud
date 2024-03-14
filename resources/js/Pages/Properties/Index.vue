<script setup>
import {Link} from '@inertiajs/vue3'

    const props = defineProps({
        property: Array
    })
</script>

<template>
    <div class="bg-white container">
        <div class="d-flex justify-content-between">
            <h1 class="text-4xl my-3 text-primary">Owner List</h1>
            <div class="flex">
                <a href="/properties/csvDownload" target="_blank" class="p-2 bg-green-600 text-white rounded m-3">Download CSV</a>
                <Link href="/Properties/Create" class="p-2 bg-green-600 text-white rounded m-3">Create</Link>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>Owner</th>
                    <th>Type</th>
                    <th>Rental</th>
                    <th class="text-center">View</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="property in property" :key="property.id">
                        <td :class="{'text-success' : property.status, 'text-danger' : !property.status}">
                            {{ property.owner }}
                        </td>
                    <td>{{ property.type }}</td>
                    <td>₱{{ property.rental_amount }}</td>
                    <td class="text-center">
                        <Link :href="'/properties/' + property.id" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </Link>
                    </td>
                    <td>
                        <Link :href="'/properties/toggle-featured/' + property.id" method="post" preserve-scroll>{{ property.status ? 'Paid' : 'Not Paid'}}</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
