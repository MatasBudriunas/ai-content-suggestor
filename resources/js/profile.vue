<template>
    <section role="region" aria-labelledby="experience-description">
        <h2 id="experience-description">Experience description</h2>
        <div class="info">
            <label for="experience-description">Give us a description of your work experience</label>
            <textarea v-model="experience" name="experience-description" rows="4" cols="60" @blur="getAIResponse(experience, 'experience')"></textarea>
        </div>
        <div v-if="experienceOutput" class="experience-output">
            {{ experienceOutput }}
        </div>
    </section>
    <section role="region" aria-labelledby="skills-description">
        <h2 id="skills-description">Skill description</h2>
        <div class="info">
            <label for="skill-description">Give us a description of your skills</label>
            <textarea v-model="skills" name="skill-description" rows="4" cols="60" @blur="getAIResponse(skills, 'skills')"></textarea>
        </div>
        <div v-if="skillsOutput" class="skills-output">
            {{ skillsOutput }}
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: "profile.vue",
    data() {
        return {
            experience: null,
            skills: null,
            experienceOutput: null,
            skillsOutput: null,
        }
    },
    methods: {
        async getAIResponse(input, field) {
            this.loading = true;
            axios.get('/api/completion', {
                params: {
                    input: input
                }
            }).then((resp) => {
                if (field === 'experience') {
                    this.experienceOutput = resp.data.output;
                } else if (field === 'skills') {
                    this.skillsOutput = resp.data.output;
                }
            });

            this.loading = false;
        }
    }
}
</script>




