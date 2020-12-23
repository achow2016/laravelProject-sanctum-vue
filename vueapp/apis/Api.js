import axios from "axios";
const URL = 'http://127.0.0.1:8000';
//const URL = 'http://localhost:8080';

let Api = axios.create({
	baseURL: URL;
});	

export default Api;