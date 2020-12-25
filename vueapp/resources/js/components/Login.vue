<template>
	<div class="col">
		<div class="row text-center">
				<div class="col">
					<h2 class="text-center">Register</h2>
					<div class="col">
						<!--csrf field was here-->
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="name">Name:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" v-model="name" class="form-control" id="name">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="email">Email:</label>
							</div>
							<div class="col-sm-8">
								<input type="email" v-model="email" class="form-control" id="email">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label for="password">Password:</label>
							</div>
							<div class="col-sm-8">
								<input type="password" v-model="password" class="form-control" id="password">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="password">Password Again:</label>
							</div>
							<div class="col-sm-8">
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

					<!--session messages-->
					<div class="row text-center">
						<div class="col">
							{{message}}
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
		props : ['title','message'],
		data() {
			return {
				name: '',
				email: '',
				password: '',
				password_confirmation: ''			
			}
		},
		methods: {
			process() {
				Csrf.getCookie().then(() => {
					User.register({
						_method: 'POST',
						name: this.name,
						email: this.email,
						password: this.password,
						password_confirmation: this.password_confirmation
					})
					.then(() => {
						this.$router.push('loginForm')
					})
					.catch(error => {
						console.log(error);
					});
				});
			}
		},
	};
</script>
<style scoped>

</style>