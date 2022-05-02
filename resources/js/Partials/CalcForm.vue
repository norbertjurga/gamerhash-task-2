<script setup>
import { ref } from "vue";
import ValidationMessage from "@/Components/ValidationMessage.vue";

const props = defineProps({
    firstNumber: Number,
    secondNumber: Number,
});

const result = ref(0);
const errors = ref({});

const calculate = () => {
    let validated = validateInputs();

    if (validated.firstNumber || validated.secondNumber) {
        errors.value = validated;
        result.value = 0;
    } else {
        let sum = props.firstNumber + props.secondNumber;
        result.value = sum;
        errors.value = {};
    }
};

const validateInputs = () => {
    return {
        firstNumber: typeof props.firstNumber !== "number",
        secondNumber: typeof props.secondNumber !== "number",
    };
};
</script>

<template>
    <div>
        <label class="input-group justify-center max-w-xs">
            <span>Result</span>
            <input
                type="text"
                disabled
                v-model="result"
                class="input input-bordered w-full max-w-xs"
            />
        </label>

        <div class="w-full justify-center items-center">
            <div class="form-control w-full max-w-xs mx-auto">
                <input
                    type="number"
                    v-model="firstNumber"
                    placeholder="Number 1"
                    class="input input-bordered w-full max-w-xs"
                />
                <ValidationMessage v-if="errors.firstNumber" />
            </div>
        </div>
        <div class="w-full justify-center items-center">
            <div class="form-control w-full max-w-xs mx-auto">
                <input
                    type="number"
                    v-model="secondNumber"
                    placeholder="Number 2"
                    class="input input-bordered w-full max-w-xs"
                />
                <ValidationMessage v-if="errors.secondNumber" />
            </div>
        </div>

        <button
            @click="calculate()"
            class="btn btn-sm btn-error"
        >
            Calculate
        </button>
    </div>
</template>
