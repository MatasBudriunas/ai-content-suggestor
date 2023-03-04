<template>
    <b-container>
        <div class="form-group">
            <label for="questionInput">Ask a question for content generation: </label>
            <input class="form-control" id="questionInput"
                   v-model="input"
                   type="text"
                   required
            >
            <button class="btn btn-primary" @click="getAIResponse">Submit</button>
        </div>
    </b-container>
    <div v-if="answerProvided" class="answer-block">
        {{ output }}
    </div>
</template>

<script>
export default {
    name: "App.vue",
    data() {
        return {
            output: null,
            input: null,
            answerProvided: false,
            preventDefault: true
        }
    },
    methods: {
        async getAIResponse() {
            axios.get('/api/completion', {
                params: {
                    input: this.input
                }
            }).then((resp) => {
                this.output = resp.data.output
            });

            this.answerProvided = true;
        }
    }
}
</script>

<style scoped>
</style>
