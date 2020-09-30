<template>
	<v-dialog v-model="value" persistent max-width="500">
        <v-card>
            <v-card-title class="headline">
                Delete book
            </v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="deep-orange darken-4" text @click="close()">
                    Cancel
                </v-btn>
                <v-btn color="deep-orange darken-4" dark @click="confirm()">
                    Delete
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: ['value', 'id'],
    methods: {
		confirm(){
			axios.delete('/api/books/'+this.id+'/delete')
			.then((response) => {
				this.$emit('reloadModal', 'deleteModal')
			})
			.catch(error => {
				error
			})
        },
		close(){
            this.$emit('closeModal')
        }
    }
}
</script>

<style>

</style>