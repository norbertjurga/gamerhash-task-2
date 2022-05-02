<script setup>
import { Head } from '@inertiajs/inertia-vue3';

import Divider from "@/Components/Divider.vue"
import ApplicationLogo from "@/Components/ApplicationLogo.vue"

import EntriesTable from "@/Partials/EntriesTable.vue"
import EntryForm from "@/Partials/EntryForm.vue"
import CalcForm from "@/Partials/CalcForm.vue"

const props = defineProps({
    entriesQuantity: Number,
    entries: Array,
});


</script>

<template>
    <Head title="Recruitment" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-base-300 sm:items-center sm:pt-0"
    >
        <div class="md:w-1/2 w-full mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center py-8 sm:pt-0">
                <ApplicationLogo />
            </div>

            <div class="md:flex w-full">

                <CalcForm class="grid w-full py-8 flex-grow card bg-base-100 rounded-box content-center place-items-center gap-8"/>

                <Divider />

                <div class="w-full flex-grow gap-4 mt-4 md:mt-0">
                    <div class="card bg-base-100 rounded-box py-8">
                        <EntryForm />
                    </div>

                    <EntriesTable v-if="entries.length" :items-per-page="6" :entries="entries"/>
                </div>

            </div>
        </div>
    </div>
</template>


