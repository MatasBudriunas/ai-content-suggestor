<template>
    <div class="question-block">
        <label>Ask a question for content generation: </label>
        <input v-model="input"
               type="text"
               required
        >
        <button @click="getAIResponse">Submit</button>
    </div>
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
            answerProvided: false
        }
    },
    methods: {
        getAIResponse() {
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
.question-block, .answer-block {
    text-align: center;
}
</style>
