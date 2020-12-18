import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Welcome from './components/Welcome'
import Login from './components/Login'
import Register from './components/Register'
import Home from './components/Home'

const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/',
			name: 'welcome',
			component: Welcome,
			props: { title: "This is the SPA home" }
		},
		{
			path: '/login',
			name: 'login',
			component: Login,
			props: {}
		},
		{
			path: '/welcome',
			name: 'welcome',
			component: Welcome,
			props: {}
		},
		{
			path: '/register',
			name: 'register',
			component: Register,
			props: {}
		},
		{
			path: '/home',
			name: 'home',
			component: Home,
			props: {}
		},		
		/*
		{
			path: '/spa-page',
			name: 'page',
			component: Page,
			props: { 
				title: "This is the SPA Second Page",
				author : {
					name : "Fisayo Afolayan",
					role : "Software Engineer",
					code : "Always keep it clean"
				}
			}
		},
		*/		
	],
})
const app = new Vue({
	el: '#app',
	components: { App },
	router,
});