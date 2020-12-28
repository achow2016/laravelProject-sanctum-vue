<template>
    <div>
		<h1>logged in!</h1>
		<a @click.prevent="process">get data</a>
    </div>
</template>
<script>
	import User from '../apis/User';
	export default {
		props : ['title','message','error'],
		data() {
			return {
				secrets: []
			}
		},
		methods: {
			process(){ 
					console.log(sessionStorage.getItem('token'));
					User.checkAccess({_method: 'POST', token: sessionStorage.getItem('token')}, sessionStorage.getItem('token')).then((response) => {
						console.log(response.data);
					});
			}	
		}
	}
</script>
<style scoped>

</style>