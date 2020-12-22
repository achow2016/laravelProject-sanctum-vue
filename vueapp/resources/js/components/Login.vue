<template>
	<div class="col">
		<div class="row text-center">
			<div v-if="!secrets.length" class="col">
				<h1>{{title}}</h1>
				<h2>Log In</h2>
				<form class="col" method="POST" action="#" @submit.prevent="performLogin">
					<!--csrf field was here-->
					<div class="form-group row">
						<div class="col-sm-3">
							<label for="email">Email:</label>
						</div>
						<div class="col-sm-8">
							<input type="email" class="form-control" v-model="formData.email">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-3">
							<label for="password">Password:</label>
						</div>
						<div class="col-sm-8">
							<input type="password" class="form-control" autocomplete="on" v-model="formData.password">
						</div>
					</div>

					<div class="form-group row">
						<!--div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div-->
						<div class="col-sm-8 offset-sm-2">
							<button type="submit" class="btn btn-primary">Login</button>
							<br><br>
							<a href="/register">Register</a>
							<br><br>
							<a href="/loginReset">Reset Pass</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--login session messages-->
		<div class="row text-center">
			<div class="col">
				{{message}}
			</div>
		</div>
		<div class="row text-center">
			<div class="col">
				{{error}}
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		props : ['title','message','error'],
		data() {
			return {
				secrets: [],
				formData: {
					email: '',
					password: ''
				}
			}
		},
		methods: {
			performLogin() {
				axios.get('/sanctum/csrf-cookie').then(response => {
					axios.post('loginForm/login', this.formData).then(response => {
						console.log('User signed in!');
					}).catch(error => console.log(error)); //mismatch fail
				});
			},
			getSecrets() {
				axios.get('/api/secrets').then(response => this.secrets = response.data);
			}
		}	
	}

</script>
<style scoped>

</style>