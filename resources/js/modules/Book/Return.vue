<template>
    <v-dialog v-model="value" persistent max-width="500">
        <v-card>
            <v-card-title class="headline">
                Return book
            </v-card-title>
            <v-card-text>
                <v-form ref="form">
                    <v-row no-gutters>
                        <v-col>
                            <span>User: {{ user.name }}</span><br>
                            <span>Email: {{ user.email }}</span>
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
            user: '',
            menu: false,
            items: {
                categories: [],
            }
        }
    },
    methods: {
        index(){
            this.user = ''
            axios.get('/api/books/'+this.id+'/user')
			.then((response) => {
				this.user = response.data
			})
			.catch(error => {
				error
			})
        },
        save(){
            if(this.$refs.form.validate()){
                axios.put('/api/books/'+this.id+'/return', {})
                .then((response) => {
                    this.$emit('reloadModal', 'returnModal')
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