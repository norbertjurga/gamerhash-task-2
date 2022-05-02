<script setup>
import { computed, ref } from "vue";

const props = defineProps({
    entries: Array,
    itemsPerPage: {
        type: Number,
        default: 6
    },
});

// simple pagination, nothing fancy
// obviously - normally I'd paginate entries in BE

const currentPage = ref(1);
const totalPages = computed( () => Math.ceil(props.entries.length / props.itemsPerPage) );

const nextPage = () => {
    if (currentPage.value < totalPages.value) ++currentPage.value;
};
const previousPage = () => {
    if (currentPage.value > 1) --currentPage.value;
};

const canDisplayRecord = function (key) {
    let maxKey = currentPage.value * props.itemsPerPage - 1;
    let minKey = (currentPage.value * props.itemsPerPage) - props.itemsPerPage;

    if (key >= minKey && key <= maxKey) return true;
};

</script>

<template>
    <div class="overflow-x-auto w-full mx-auto mt-4">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Text</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(entry, key) in entries" :key="key">
                    <td v-if="canDisplayRecord(key)">{{ entry }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="w-full mt-6" v-show="totalPages > 1">
        <div class="btn-group w-full justify-center items-center gap-2">
            <button :disabled="(currentPage == 1)" @click="previousPage()" class="btn">«</button>
            <p>Page {{ currentPage }} of {{ totalPages }}</p>
            <button :disabled="(currentPage >= totalPages)" @click="nextPage()" class="btn">»</button>
        </div>
    </div>
</template>
