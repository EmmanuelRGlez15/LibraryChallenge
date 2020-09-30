<template>
	<div>
		<v-card flat>
			<v-card-text>
				<v-row align="center">
					<v-col cols="12" lg="4">
						<v-text-field v-model="tableProps.search" color="deep-orange darken-4" placeholder="Search a category" clearable prepend-inner-icon="mdi-magnify" hide-details></v-text-field>
					</v-col>
					<v-spacer></v-spacer>
					<v-col cols="12" lg="2">
						<v-btn color="brown" block tile dark @click="createModal = true">New category</v-btn>
					</v-col>
				</v-row>
				<v-row>
					<v-col>
						<v-data-table :headers="tableProps.headers" :items="tableProps.items" :search="tableProps.search" class="elevation-1">
                            <template v-slot:[`item.actions`]="{ item }">
                                <v-tooltip top v-for="(action, i) of item.actions" :key="i">
                                    <template v-slot:activator="{ on }">
                                        <v-btn x-small class="mx-0" icon @click="method_handler(action.action, item.parameters)">
                                            <v-icon :color="action.icon.color" v-on="on">{{ action.icon.icon }}</v-icon>
                                        </v-btn>
                                    </template>
                                    <span>{{ action.name }}</span>
                                </v-tooltip>
                            </template>
                        </v-data-table>
					</v-col>
				</v-row>
			</v-card-text>
		</v-card>

		<books-modal :value="dialog" :id="category_id" type="category" @closeModal="dialog = false"></books-modal>
		<category-create :value="createModal" @closeModal="createModal = false" @reloadModal="reload"></category-create>
	</div>
</template>

<script>
import BooksModal from './Books'
import CategoryCreate from './Create'

export default {
	components: {
		'books-modal': BooksModal,
		'category-create': CategoryCreate
	},
	data(){
		return {
			dialog: false,
			createModal: false,
			category_id: null,
			actions: [
                {
                    name: 'Related books',
					icon: {
                        color: 'deep-orange darken-4',
						icon: 'mdi-buffer'
                    },
                    action: 'getRelatedBooks'
				}
            ],
			tableProps: {
				headers: [
					{
						text: 'Name',
						align: 'left',
						value: 'name',
						class: 'brown--text text-uppercase'
					},
					{
						text: 'Description',
						align: 'center',
						value: 'description',
						class: 'brown--text text-uppercase'
					},
					{
						text: 'Actions',
						align: 'right',
						sortable: false,
						value: 'actions',
						class: 'brown--text text-uppercase'
					}
				],
				items: [],
				search: ''
			},
		}
	},
	methods: {
		method_handler(method_name, parameters){
			this[method_name](parameters)
		},
		index(){
			axios.get('/api/getCategories')
			.then((response) => {
				this.tableProps.items = response.data.map((x) => {
                    x['actions'] = JSON.parse(JSON.stringify(this.actions))
                    x.parameters = { id: x.id}
					return x
				})
			})
			.catch(error => {
				error
			})
		},
		reload(){
			this.createModal = false
			this.index()
		},
		getRelatedBooks(params){
			this.dialog = true
			this.category_id = params.id
		}
	},
	mounted(){
		this.index()
	}
}
</script>

<style>

</style>