<template>
	<div>
		<nav class="row">
			<div class="col btn-group d-flex" role="group">
			<div class="flex-fill w-33">
				<router-link :to="{ name: 'login' }"><button type="button" class="btn btn-primary w-100">login</button></router-link>
			</div>	
			<div class="flex-fill w-33">
				<router-link :to="{ name: 'register' }"><button type="button" class="btn btn-primary w-100">register</button></router-link>
			</div>	
			<div class="flex-fill w-33">
			<router-link :to="{ name: 'resetPass' }"><button type="button" class="btn btn-primary w-100">reset</button></router-link>
			</div>
			</div>				
		</nav>
		<main class="row">
			<router-view></router-view>
		</main>
	</div>
</template>
<script>
	export default {}
</script>