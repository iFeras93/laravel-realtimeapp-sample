<template>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul v-if="projects">
            <li v-for="(project,index) in projects" :key="index">
                <list-item :project="project"></list-item>
            </li>
        </ul>
        <p v-else>
            No assigned project yet!
        </p>
    </div>
</template>

<script>
export default {
    name: "list",
    data() {
        return {
            projects: [],
        }
    },
    methods: {
        fetchAssignedProjects() {
            window.axios.get(`/users/projects`).then(({data}) => {
                this.projects = data
            })
        },

    },
    created() {
        this.fetchAssignedProjects()
    }
}
</script>

<style scoped>

</style>
