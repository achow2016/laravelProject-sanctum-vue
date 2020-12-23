import Api from "./Api";

export default {
	getCookie() {
		Api.get('/csrf-cookie');
	}
}