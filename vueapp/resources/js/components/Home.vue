<template>
	<section class="col">
		<div class="row text-center">
			<div class="col">
				<h1>{{title}}</h1>
			</div>	
		</div>	
		<div class="row text-center">
			<div class="col">
				<h2>Welcome!</h2>
			</div>	
		</div>
	</section>
</template>
<script>
	export default {
		props : ['title','message','error']
	}
</script>
<style scoped>

</style>