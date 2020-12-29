<template>
	<div class="col">
		<nav class="row">
			<div class="col btn-group d-flex" role="group">
				<div class="flex-fill w-50">
					<router-link :to="{ name: 'register' }"><button type="button" class="btn btn-primary w-100">register</button></router-link>
				</div>	
				<div class="flex-fill w-50">
					<router-link :to="{ name: 'resetPass' }"><button type="button" class="btn btn-primary w-100">reset</button></router-link>
				</div>
			</div>				
		</nav>
		
		<div class="row text-center">
				<div class="col">
					<h2 class="text-center">Login</h2>
					<div class="col">
						<div class="form-group row">
							<div v-if="errorList.message" class="col-sm-8 alert alert-warning" role="alert">
								<span class="text-danger">{{errorList.message[0]}}</span>
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
						
						<div class="row">
							<div class="col-sm-8 offset-sm-2">
								<button type="submit" @click.prevent="process" class="btn btn-primary">Login</button>
								<br><br>
								<a href="/registerForm">Register</a>
								<br><br>
								<a href="/resetPass">Reset Pass</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
</template>
<script>
	import User from '../apis/User';
	
	export default {
		props : ['title','message'],
		data() {
			return {
				email: '',
				password: '',
				errorList: []
			}
		},
		methods: {
			process() {
				User.login({
					_method: 'POST',
					name: this.name,
					email: this.email,
					password: this.password
				})
				.then((response) => {
					console.log(response.data.token.plainTextToken);
					sessionStorage.removeItem('token');
					sessionStorage.setItem('token', response.data.token.plainTextToken);
					this.$router.push('welcome');
				})
				.catch(error => {
					if(error.response.status == 422)
						this.errorList = error.response.data.errors;	
				});
			}
		}
	};
</script>
<style scoped>
</style>