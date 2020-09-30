<template>
    <v-app>
        <v-navigation-drawer v-model="drawer" app permanent expand-on-hover color="brown lighten-5">
            <v-list-item v-for="(link, i) in menu" :key="i" :to="link.route" active-class="orange lighten-2 black--text">
                <v-list-item-icon><v-icon>{{ link.icon }}</v-icon></v-list-item-icon>
                <v-list-item-title>{{ link.title }}</v-list-item-title>						
            </v-list-item>
        </v-navigation-drawer>

        <v-app-bar app color="brown darken-1" dark dense>
            <v-toolbar-title>Library</v-toolbar-title>
        </v-app-bar>
        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
	import Vue from "vue";
	import VueRouter from "vue-router";	
	import Vuetify from "vuetify";
    import 'vuetify/dist/vuetify.css';
	import routes from "./router/index"

	Vue.use(VueRouter);
	Vue.use(Vuetify);

	const router = new VueRouter({
		mode: 'history',
		routes: routes
	})

	export default {
		vuetify: new Vuetify({
			theme: {
				// dark: true,
			},
		}),
		router: router,
		components: {			
		},
		computed:{
        },
		mounted(){
		},
		data(){
			return {
                drawer: null,
                menu: [
                    { title: 'Books', icon: 'mdi-book-open-page-variant', route: '/books' },
                    { title: 'Categories', icon: 'mdi-book', route: '/categories' },
                    { title: 'Users', icon: 'mdi-account-circle', route: '/users' },
                ]
			}
		},
		methods: {
		},
}
</script>
