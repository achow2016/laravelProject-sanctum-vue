<template>
	<div class="col">
		<div class="row text-center">
				<div class="col">
					<h2 class="text-center">Register</h2>
					<div class="col">
					
						<div class="row" v-if="!!message">
							<span v-if="!!message" class="col-sm-8 alert alert-warning" role="alert">{{message}}</span>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="name">Name:</label>
							</div>
							<div v-if="errorList.name" class="col-sm-8 alert alert-warning" role="alert">
								<input type="text" v-model="name" class="form-control" id="name">
								<span class="text-danger">{{errorList.name[0]}}</span>
							</div>	
							<div class="col-sm-8" v-else>
								<input type="text" v-model="name" class="form-control" id="name">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="email">Email:</label>
							</div>
							<div v-if="errorList.email" class="col-sm-8 alert alert-warning" role="alert">
								<input type="email" v-model="email" class="form-control" id="email">
								<span class="text-danger">{{errorList.email[0]}}</span>
							</div>	
							<div v-else class="col-sm-8">
								<input type="email" v-model="email" class="form-control" id="email">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label for="password">Password:</label>
							</div>
							<div v-if="errorList.password" class="col-sm-8 alert alert-warning" role="alert">
								<input type="password" v-model="password" class="form-control" id="password">
								<span class="text-danger">{{errorList.password[0]}}</span>
							</div>	
							<div v-else class="col-sm-8">
								<input type="password" v-model="password" class="form-control" id="password">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="password">Password Again:</label>
							</div>
							<div v-if="errorList.password" class="col-sm-8 alert alert-warning" role="alert">
								<input type="password" v-model="password_confirmation" class="form-control" id="password_confirmation">
							</div>	
							<div v-else class="col-sm-8">
								<input type="password" v-model="password_confirmation" class="form-control" id="password_confirmation">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8 offset-sm-2">
								<button type="submit" @click.prevent="process" class="btn btn-primary">Register</button>
								<br><br>
								<a href="/login">Login</a>
								<br><br>
								<a href="/loginReset">Reset Pass</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
</template>
<script>
	import User from '../apis/User';
	import Csrf from '../apis/Csrf';
	
	export default {
		props : ['title'],
		data() {
			return {
				name: '',
				email: '',
				password: '',
				password_confirmation: '',		
				errorList: [],
				message: ''
			}	
		},
		methods: {
			process() {
				Csrf.getCookie().then(() => {
					User.register({
						name: this.name,
						email: this.email,
						password: this.password,
						password_confirmation: this.password_confirmation
					})
					.then(response => {
						console.log(response);
						this.message = response.data.message;
					})
					.catch(error => {
						if(error.response.status == 422)
							this.errorList = error.response.data.errors;
					});
				});
			}
		}
	};
</script>
<style scoped>
</style>