<template>
	<div class="col">
		<div class="row text-center">
				<div class="col">
					<h2 class="text-center">Register</h2>
					<form class="col" method="POST" action="/register">
						<!--csrf field was here-->
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="name">Name:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="name" name="name">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="email">Email:</label>
							</div>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" name="email">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label for="password">Password:</label>
							</div>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="password" name="password" autocomplete="on">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label for="password">Password Again:</label>
							</div>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="passwordConf" name="passwordConf" autocomplete="on">
							</div>
						</div>

						<div class="form-group row">
							<!--div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div-->
							<div class="col-sm-8 offset-sm-2">
								<button type="submit" class="btn btn-primary">Login</button>
								<br><br>
								<a href="/login">Login</a>
								<br><br>
								<a href="/loginReset">Reset Pass</a>
							</div>
						</div>
					</form>

					<!--session messages-->
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