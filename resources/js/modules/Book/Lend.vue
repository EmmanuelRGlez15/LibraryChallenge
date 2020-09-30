<template>
    <v-dialog v-model="value" persistent max-width="500">
        <v-card>
            <v-card-title class="headline">
                Lend book
            </v-card-title>
            <v-card-text>
                <v-form ref="form">
                    <v-row no-gutters>
                        <v-col>
                            <v-autocomplete label="User *" v-model="user_id" :rules="rules.required" :items="items.users"></v-autocomplete>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="deep-orange darken-4" text @click="close()">
                    Cancel
                </v-btn>
                <v-btn color="deep-orange darken-4" dark @click="save()">
                    Confirm
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: ['value', 'id'],
    data(){
        return {
            route: '/api/getUsers',
            user_id: '',
            menu: false,
            items: {
                users: [],
            },
            rules: {
                required: [
                    v => !!v || 'Field required'
                ]
            }
        }
    },
    methods: {
        index(){
            this.items.users = []
            axios.get(this.route)
			.then((response) => {
				this.items.users = response.data
			})
			.catch(error => {
				error
			})
        },
        save(){
            if(this.$refs.form.validate()){
                axios.post('/api/books/'+this.id+'/lend', { user_id: this.user_id })
                .then((response) => {
                    this.$refs.form.reset()
                    this.$emit('reloadModal', 'lendModal')
                })
                .catch(error => {
                    error
                })
            }
        },
        close(){
            this.$emit('closeModal')
        }
    },
    mounted(){
        this.index()
    },
    watch: {
        id(newVal, oldVal){
            if(newVal != null)
                this.index()
        }
    }
}
</script>

<style>

</style>