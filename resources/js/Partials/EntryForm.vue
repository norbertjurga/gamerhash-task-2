<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationMessage from "@/Components/ValidationMessage.vue";

const form = useForm({
    _method: "POST",
    text: "",
    errorBag: 'addEntry',
});

const hasErrors = ref(false);

const addEntry = () => {
        form.post(route("entries.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset()
        });
};

</script>

<template>
    <div class="form-control w-3/4 mx-auto">
        <div class="input-group">
            <input
                type="text"
                v-model="form.text"
                placeholder="Your text..."
                class="input input-bordered w-full"
            />
            <button
                @click="addEntry()"
                :class="{ 'opacity-75': form.processing }"
                :disabled="form.processing"
                class="btn btn-square btn-error"
            >
                Add
            </button>
        </div>
        <ValidationMessage v-if="form.errors.text">
            {{ form.errors.text }}
        </ValidationMessage>
    </div>
</template>
