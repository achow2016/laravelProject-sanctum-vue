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
	async resetPassword(form, token) { 
		await Csrf.getCookie();
		return Api.post('/processResetRequest',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});	
	},
}