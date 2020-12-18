<template>
	<div>
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container">
				<ul class="navbar-nav">
					<router-link :to="{ name: 'login' }"><button type="button" class="btn btn-primary mb-2 mr-1">login</button></router-link>
					<router-link :to="{ name: 'register' }"><button type="button" class="btn btn-primary mb-2 mr-1">register</button></router-link>
					<router-link :to="{ name: 'resetPass' }"><button type="button" class="btn btn-primary mb-2">reset password</button></router-link>
				</ul>
			</div>
		</nav>
		<main>
			<router-view></router-view>
		</main>
	</div>
</template>
<script>
	export default {}
</script>