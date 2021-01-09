import Api from './Api';
import Csrf from './Csrf';

export default {
	async register(form) {
		await Csrf.getCookie();
		return Api.post('/register', form);
	},
	async login(form) {
		await Csrf.getCookie();
		return Api.post('/login', form);
	},	
	async getData(form, token) { 
		await Csrf.getCookie();
		return Api.post('/getData',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});	
	},
	async logout(form, token) { 
		await Csrf.getCookie();
		return Api.post('/logout',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});	
	},
	/*
	async resetPassword(form, token) { 
		await Csrf.getCookie();
		return Api.post('/processPasswordReset',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});	
	},
	*/
	async resetPassword(form) {
		await Csrf.getCookie();
		return Api.post('/resetPassword', form);
	},
	async getPosts(form, token) {
		await Csrf.getCookie();
		return Api.post('/getPosts',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});
	},
	async getReplies(form, token) {
		await Csrf.getCookie();
		return Api.post('/getReplies',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});
	},
	async makePostReply(form, token) {
		await Csrf.getCookie();
		return Api.post('/makePostReply',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});
	},
	async makePost(form, token) {
		await Csrf.getCookie();
		return Api.post('/makePost',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});
	},
}