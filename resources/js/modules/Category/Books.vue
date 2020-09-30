<template>
    <v-dialog v-model="value" persistent max-width="500">
        <v-card>
            <v-card-title class="headline">
                Books
            </v-card-title>
            <v-card-text>
                <span v-if="items.length <= 0">No results</span>
                <v-list v-else dense>
                    <v-list-item-group>
                        <v-list-item two-line v-for="(item, i) in items" :key="i">
                            <v-list-item-content>
                                <v-list-item-title v-text="item.name"></v-list-item-title>
                                <v-list-item-subtitle>{{ item.author+ ', ' +item.publication_date }}</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="deep-orange darken-4" text @click="close()">
                    Close
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: ['value', 'id', 'type'],
    computed: {
        route(){
            return (this.type === 'category') ? '/api/getBooksByCategory/' : '/api/getBooksByUser/'
        }
    },
    data(){
        return {
            items: []
        }
    },
    methods: {
        index(){
            this.items = []
            axios.get(this.route + this.id)
			.then((response) => {
				this.items = response.data
			})
			.catch(error => {
				error
			})
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