<template>
    <b-container>
        <div class="form-group">
            <label for="questionInput" class="question">Ask a question for content generation: </label>
            <input class="form-control" id="questionInput"
                   v-model="input"
                   type="text"
                   required
            >
            <button class="btn btn-primary" @click="getAIResponse">Submit</button>
        </div>
    </b-container>
    <div v-if="output" class="output">
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
            loading: false
        }
    },
    methods: {
        async getAIResponse() {
            this.loading = true;
            axios.get('/api/completion', {
                params: {
                    input: this.input,
                    type: null
                }
            }).then((resp) => {
                this.output = resp.data.output
            });

            this.loading = false;
        }
    }
}
</script>

<style scoped>
.form-group {
    display: block;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    justify-items: center;
    padding: 5rem 10px 10px 1rem;
    margin: 0 auto;
    max-width: 50%;
}

.question {
    font-family: Baskervville, serif;
    font-size: 1.5rem;
    margin: 0 auto;
    padding-bottom: 10px;
    display: block;
    justify-items: center;
    text-align: center;
}

.btn-primary {
    display: block;
    margin: 1rem auto;
}

.output {
    font-family: Baskervville, serif;
    font-size: 1.2rem;
    display: block;
    text-align: center;
    justify-items: center;
    max-width: 50%;
    margin: 0 auto;
}
</style>
