<template>
    <v-dialog v-model="value" persistent max-width="500">
        <v-card>
            <v-card-title class="headline">
                Create new category
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
                            <v-textarea label="Description *" v-model="form.description" :rules="rules.required"></v-textarea>
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
            form: {
                name: '',
                description: ''
            },
            rules: {
                required: [
                    v => !!v || 'Field required'
                ]
            }
        }
    },
    methods: {
        save(){
            if(this.$refs.form.validate()){
                axios.post('/api/categories/store', this.form)
                .then((response) => {
                    this.$refs.form.reset()
                    this.$emit('reloadModal')
                })
                .catch(error => {
                    error
                })
            }
        },
        close(){
            this.$emit('closeModal')
        }
    }
}
</script>

<style>

</style>