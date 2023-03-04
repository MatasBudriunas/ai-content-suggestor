<template>
    <div>
        <h1>{{ output }}</h1>
    </div>
</template>

<script>
export default {
    name: "App.vue",
    data() {
        return {
            output: null,
        }
    },
    created() {
        this.getAIResponse();
    },
    methods: {
        getAIResponse() {
            axios.get('/api/completion').then((resp) => {
                this.output = resp.data.output
            });
        }
    }
}
</script>

<style scoped>

</style>
