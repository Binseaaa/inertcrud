<script setup>
import {Link} from '@inertiajs/vue3'
import {ref} from 'vue'
import {useForm} from '@inertiajs/vue3'

    const props = defineProps({
        property: Object
    })

    const showEdit = ref(false)

    const form = useForm({
        owner: props.property.owner,
        phone: props.property.phone,
        address: props.property.address,
        type: props.property.type,
        rental_amount: props.property.type
    })

    // const delForm = useForm({
    //     id: props.employee.id
    // })

    // const delEmployee = () => {
    //     const del = confirm('Are you sure you want to delete?')
    //     if(del)
    //     delForm.submit('delete', '/employee/' + props.employee.id)
    // }

    // const submit = () => {
    //     form.submit('put', '/employee/' + props.employee.id);
    // }
</script>

<template>
    <div class="p-8">

        <h1 class="text-4xl">View Property:</h1>
        <div class="border border-green-400 p-4 rounded m-4 shadow">
            <table v-if="!showEdit" class="table-bordered table-striped">
                    <tr><th>Owner:</th> <td>{{ property.owner }}</td></tr>
                    <tr><th>Contact Number: </th><td>{{ property.phone }}</td></tr>
                    <tr><th>Address: </th><td>{{ property.address }}</td></tr>
                    <tr><th>Type:</th><td>{{ property.type }}</td></tr>
                    <tr><th>Rental Amount: </th><td>₱ {{ property.rental_amount }}</td></tr>
            </table>

            <div v-if="showEdit">
                <form action="" @submit.prevent="submit">
                    <div class="mb-3">
                    <label for="owner">Owner</label>
                    <input type="text" id="owner" class="w-full" v-model="form.owner">
                </div>
                <div class="mb-3">
                    <label for="phone">Contact Number</label>
                    <input type="text" id="phone" class="w-full" v-model="form.phone">
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="w-full" v-model="form.address">
                </div>
                <div class="mb-3">
                    <label for="type">Type</label>
                    <input type="text" id="type" class="w-full" v-model="form.type">
                </div>
                <div class="mb-3">
                    <label for="rental_amount">Rental Amount</label>
                    <input type="text" id="rental_amount" class="w-full" v-model="form.rental_amount">
                </div>
            </form>
            </div>
            <br>
            <Link href="/properties" class="px-4 py-2 mt-4 bg-green-700 text-white rounded">Back</Link>
        </div>
    </div>
</template>
