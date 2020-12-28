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
	async getUser() {
		await Csrf.getCookie();
		return Api.get('/user');
	},
	
	async checkAccess(form, token) { 
		await Csrf.getCookie();
		return Api.post('api/checkAccess',form,{headers: {
			'Content-type' : 'application/json',
			'Authorization': `Bearer ${token}` 
		}});	
	},
}