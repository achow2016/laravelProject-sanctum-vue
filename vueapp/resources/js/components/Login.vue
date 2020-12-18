<template>
	<div class="flex-center position-ref full-height">
		<div class="content">
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
	</div>
</template>
<script>
	export default {
		props : ['title','message','error']
	}
</script>
<style scoped>
	html, body {
		background-color: #fff;
		color: #636b6f;
		font-family: 'Raleway', sans-serif;
		font-weight: 100;
		height: 100vh;
		margin: 0;
	}

	.full-height {
		height: 100vh;
	}

	.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
	}

	.position-ref {
		position: relative;
	}

	.top-right {
		position: absolute;
		right: 10px;
		top: 18px;
	}

	.content {
		text-align: center;
	}

	.title {
		font-size: 84px;
	}

	.links > a {
		color: #636b6f;
		padding: 0 25px;
		font-size: 12px;
		font-weight: 600;
		letter-spacing: .1rem;
		text-decoration: none;
		text-transform: uppercase;
	}

	.m-b-md {
		margin-bottom: 30px;
	}
</style>