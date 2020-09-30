<template>
    <v-dialog v-model="value" persistent max-width="500">
        <v-card>
            <v-card-title class="headline">
                Create new book
            </v-card-title>
            <v-card-text>
                <v-form ref="form">
                    <v-row no-gutters>
                        <v-col>
                            <v-text-field label="Name *" v-model="form.name" :rules="rules.required"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row no-gutters>
                        <v-col>
                            <v-text-field label="Author *" v-model="form.author" :rules="rules.required"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row no-gutters>
                        <v-col>
                            <v-autocomplete label="Category *" v-model="form.category_id" :rules="rules.required" :items="items.categories" item-text="name" item-value="id"></v-autocomplete>
                        </v-col>
                    </v-row>
                    <v-row no-gutters>
                        <v-col>
                            <v-menu v-model="menu" :close-on-content-click="false" :nudge-right="40" transition="scale-transition" offset-y min-width="290px">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field v-model="form.publication_date" label="Publication date" readonly v-bind="attrs" v-on="on" :rules="rules.required"></v-text-field>
                                </template>
                                <v-date-picker v-model="form.publication_date" @input="menu = false"></v-date-picker>
                            </v-menu>
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
                    Save
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: ['value'],
    data(){
        return {
            route: '/api/getCategories',
            form: {
                name: '',
                author: '',
                category_id: '',
                publication_date: '',
            },
            menu: false,
            items: {
                categories: [],
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
            this.items.categories = []
            axios.get(this.route)
			.then((response) => {
				this.items.categories = response.data
			})
			.catch(error => {
				error
			})
        },
        save(){
            if(this.$refs.form.validate()){
                axios.post('/api/books/store', this.form)
                .then((response) => {
                    this.$refs.form.reset()
                    this.$emit('reloadModal', 'createModal')
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