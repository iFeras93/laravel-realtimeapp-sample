<template>
    <div>
        <input type="text" name="user_id"
               class="hidden" v-if="selectedOption !== null" v-model="selectedOption.id">
        <!-- array of strings or numbers -->
        <v-select label="name" :filterable="false" @search="fetchOptions" :options="options" v-model="selectedOption">
            <template slot="no-options">
                type to search users..
            </template>
            <template slot="option" slot-scope="option">
                <div class="d-center">
                    #{{ option.id }} {{ option.name }}
                </div>
            </template>
            <template slot="selected-option" slot-scope="option">
                <div class="selected d-center">
                    #{{ option.id }} {{ option.name }}
                </div>
            </template>
        </v-select>
    </div>
</template>

<script>
export default {
    name: "users-list",
    props: {
        userId: {
            type: String,
            default: null
        },
    },
    data() {
        return {
            options: [],
            selectedOption: null
        }
    },
    methods: {
        fetchOptions(search, loading) {
            loading(true)
            this.search(loading, search, this)
        },
        search: _.debounce((loading, search, vm) => {
            window.axios.get(`/api/users?q=${search}`).then(({data}) => {
                // console.log(data)
                vm.options = data
                loading(false)
            })
        }, 350)
    },
    created() {
        if (this.userId !== null)
            this.fetchOptions('')
    }
}
</script>

<style scoped>

</style>
