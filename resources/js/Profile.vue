<template>
    <section role="region" aria-labelledby="experience-description">
        <h2 id="experience-description">Experience description</h2>
        <div class="info">
            <label for="experience-description">Give us a description of your work experience</label>
            <textarea v-model="experience" name="experience-description" rows="4" cols="60"
                      @blur="getAIResponse(experience, 'experience', 'experienceOutput', 'suggest')"></textarea>
        </div>
        <div v-if="experienceLoading && !experienceOutput">
            <DotLoader></DotLoader>
        </div>
        <div v-if="!experienceLoading && experienceOutput" class="experience-output">
            <div class="output-container">
                {{ experienceOutput }}
                <button class="btn btn-secondary btn-generate"
                        @click="getAIResponse(experience, 'experience', 'experienceOutput', 'generate')">Generate for me!
                </button>
            </div>
        </div>
    </section>
    <section role="region" aria-labelledby="skills-description">
        <h2 id="skills-description">Skill description</h2>
        <div class="info">
            <label for="skill-description">Give us a description of your skills</label>
            <textarea v-model="skills" name="skill-description" rows="4" cols="60"
                      @blur="getAIResponse(skills, 'skills', 'skillsOutput', 'suggest')"></textarea>
        </div>
        <div v-if="skillsLoading && !skillsOutput">
            <DotLoader></DotLoader>
        </div>
        <div v-if="skillsOutput" class="skills-output">
            {{ skillsOutput }}
        </div>
        <div v-if="!skillsLoading && skillsOutput" class="skills-output">
            {{ skillsOutput }}
            <button class="btn btn-secondary" @click="getAIResponse(skills, 'skills', 'skillsOutput', 'generate')">
                Generate for me!
            </button>
        </div>
    </section>
</template>

<script setup>
import {DotLoader} from "vue3-spinner";
</script>

<script>

export default {
    name: "profile.vue",
    data() {
        return {
            experience: null,
            skills: null,
            experienceOutput: null,
            skillsOutput: null,
            experienceLoading: false,
            skillsLoading: false,
        }
    },
    methods: {
        async getAIResponse(input, field, outputName, type) {
            if (input !== null) {
                this[field + "Loading"] = true;
                this[outputName] = null;
                axios.get('/api/completion', {
                    params: {
                        input: input,
                        type: type
                    }
                }).then((resp) => {
                    if (field === 'experience') {
                        this.experienceOutput = resp.data.output;
                    } else if (field === 'skills') {
                        this.skillsOutput = resp.data.output;
                    }
                    this[field + "Loading"] = false;
                });
            }
        }
    }
}
</script>
