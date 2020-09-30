<template>
	<div>
		<v-card flat>
			<v-card-text>
				<v-row align="center">
					<v-col cols="12" lg="4">
						<v-text-field v-model="tableProps.search" color="deep-orange darken-4" placeholder="Search a book" clearable prepend-inner-icon="mdi-magnify" hide-details></v-text-field>
					</v-col>
					<v-spacer></v-spacer>
					<v-col cols="12" lg="2">
						<v-btn color="brown" block tile dark @click="createModal = true">New book</v-btn>
					</v-col>
				</v-row>
				<v-row>
					<v-col>
						<v-data-table :headers="tableProps.headers" :items="tableProps.items" :search="tableProps.search" class="elevation-1">
                            <template v-slot:[`item.actions`]="{ item }">
                                <v-tooltip top v-for="(action, i) of item.actions" :key="i">
                                    <template v-slot:activator="{ on }">
                                        <v-btn x-small class="mx-0" icon @click="method_handler(action.action, item.parameters)" :disabled="item.status === 'Unavailable' && action.name === 'Delete'">
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

		<book-create :value="createModal" @closeModal="createModal = false" @reloadModal="reload"></book-create>
		<book-edit :value="editModal" :id="book_id" @closeModal="editModal = false" @reloadModal="reload"></book-edit>
		<book-delete :value="deleteModal" :id="book_id" @closeModal="deleteModal = false" @reloadModal="reload"></book-delete>
		<book-return :value="returnModal" :id="book_id" @closeModal="returnModal = false" @reloadModal="reload"></book-return>
		<book-lend :value="lendModal" :id="book_id" @closeModal="lendModal = false" @reloadModal="reload"></book-lend> 
	</div>
</template>

<script>
import BookCreate from './Create'
import BookEdit from './Edit'
import BookDelete from './Delete'
import BookReturn from './Return'
import BookLend from './Lend'

export default {
	components: {
		'book-create': BookCreate,
		'book-edit': BookEdit,
		'book-delete': BookDelete,
		'book-return': BookReturn,
		'book-lend': BookLend,
	},
	data(){
		return {
			book_id: false,
			createModal: false,
			editModal: false,
			deleteModal: false,
			returnModal: false,
			lendModal: false,
			actions: [
                {
                    name: 'Edit',
					icon: {
                        color: 'deep-orange darken-4',
						icon: 'mdi-pencil'
                    },
                    action: 'edit'
				},
				{
                    name: 'Delete',
					icon: {
                        color: 'deep-orange darken-4',
						icon: 'mdi-delete'
                    },
                    action: 'removeRecord'
				}
            ],
            actionReturn: [
                {
                    name: 'Return',
                    icon: {
                        color: 'deep-orange darken-4',
                        icon: 'mdi-arrow-bottom-left'
                    },
                    action: 'returnBook'
                }
			],
            actionLend: [
                {
                    name: 'Lend',
                    icon: {
                        color: 'deep-orange darken-4',
                        icon: 'mdi-arrow-top-right'
                    },
                    action: 'lendBook'
                },
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
						text: 'Author',
						align: 'center',
						value: 'author',
						class: 'brown--text text-uppercase'
					},
					{
						text: 'Category',
						align: 'center',
						value: 'category.name',
						class: 'brown--text text-uppercase'
					},
					{
						text: 'Status',
						align: 'center',
						value: 'status',
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
			axios.get('/api/getBooks')
			.then((response) => {
				this.tableProps.items = response.data.map((x) => {
                    var extraAction = (x.status === 'Available') ? this.actionLend : this.actionReturn
                    x['actions'] = JSON.parse(JSON.stringify([ ...this.actions, ...extraAction ]))
                    x.parameters = { id: x.id }
					return x
				})
			})
			.catch(error => {
				error
			})
		},
		reload(params){
			this[params] = false
			this.index()
		},
		edit(params){
			this.editModal = true
			this.book_id = params.id
		},
		removeRecord(params){
			this.deleteModal = true
			this.book_id = params.id
		},
		returnBook(params){
			this.returnModal = true
			this.book_id = params.id
		},
		lendBook(params){
			this.lendModal = true
			this.book_id = params.id
		},
	},
	mounted(){
		this.index()
	}
}
</script>

<style>

</style>