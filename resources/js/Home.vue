<template>
    <b-container>
        <div class="form-group">
            <label for="questionInput" class="question">Ask a question for content generation: </label>
            <input class="form-control" id="questionInput"
                   v-model="input"
                   type="text"
                   required
            >
            <button class="btn btn-outline-dark submit-btn" @click="getAIResponse">Submit</button>
        </div>
    </b-container>
    <div v-if="loading && !output" class="spinner">
        <DotLoader></DotLoader>
    </div>
    <div v-if="output" class="output">
        {{ output }}
    </div>
</template>

<script setup>
import {DotLoader} from "vue3-spinner";
</script>

<script>
export default {
    name: "App.vue",
    data() {
        return {
            output: null,
            input: null,
            loading: false
        }
    },
    methods: {
        async getAIResponse() {
            this.output = null;
            this.loading = true;
            axios.get('/api/completion', {
                params: {
                    input: this.input,
                    type: null
                }
            }).then((resp) => {
                this.output = resp.data.output
                this.loading = false;
            });
        }
    }
}
</script>

<style scoped>
</style>
