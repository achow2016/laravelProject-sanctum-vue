<template>
	<div class="col">
		<div class="row text-center">
			<div class="col">
				<h1>{{title}}</h1>
				<h2>Log In</h2>
				<form method="POST" action="/login">
					<!--csrf field was here-->
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" autocomplete="on">
					</div>

					<div class="form-group">
						<!--div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div-->

						<button type="submit" class="btn btn-primary">Login</button>
						<br><br>
						<a href="/register">Register</a>
						<br><br>
						<a href="/loginReset">Reset Pass</a>
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
		props : ['title','message','error']
	}
</script>
<style scoped>

</style>