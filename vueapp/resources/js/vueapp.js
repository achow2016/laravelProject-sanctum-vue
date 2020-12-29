import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(VueRouter)
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
//Vue.use(IconsPlugin)
window.$ = window.jQuery = require('jquery')
window.Popper = require('popper.js').default; // default is very important.

import App from './components/App'
import Welcome from './components/Welcome'
import Login from './components/Login'
import Register from './components/Register'
import Home from './components/Home'
import ResetPassword from './components/ResetPassword'
import CharacterBuilder from './components/CharacterBuilder'

//user api for sanctum auth
import User from './apis/User';

const router = new VueRouter({
	mode: 'history',
	routes: [
	
		{
			path: '/',
			name: 'home',
			component: Home,
			props: { title: "Rpg Game Home" }
		},
		{
			path: '/loginForm',
			name: 'login',
			component: Login,
			props: {}
		},
		{
			path: '/registerForm',
			name: 'register',
			component: Register,
			props: {}
		},	
		{
			path: '/resetPass',
			name: 'resetPass',
			component: ResetPassword,
			props: {}
		},
		{
			path: '/welcome',
			name: 'welcome',
			component: Welcome,
			props: {}
		},
		{
			path: '/characterBuilder',
			name: 'characterBuilder',
			component: CharacterBuilder,
			props: {}
		},						
	],
})
const app = new Vue({
	el: '#app',
	components: { App },
	router,
});