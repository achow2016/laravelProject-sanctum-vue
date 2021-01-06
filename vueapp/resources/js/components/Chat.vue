<template>
    <div class="text-light">
		<header class="row">
			<div class="col text-center d-flex">		
				<div class="flex-fill w-33">
					<router-link :to="{ name: 'welcome' }"><button type="button" class="btn btn-dark flex-fill w-100">Home</button></router-link>
				</div>	
				<div class="flex-fill w-33">
					<h3>Game Chat</h3>
				</div>	
				<div class="flex-fill w-33">
					<button v-on:click="logout" type="button" class="btn btn-dark flex-fill w-100">Logout</button>
				</div>	
			</div>
		</header>
		
		<section class="row text-center mt-2 mb-2">
			<div class="col">
				<div v-if="!!posts" class="col-sm-8">
					<div v-for="post in posts">
						<div class="row">
							<div class="col">
								{{post.name}}
							</div>
							<div class="col">
								{{post.date}}
							</div>
						</div>
						<div class="row">
							<div class="col">
								{{post.postText}}
							</div>
						</div>
						<div class="row">
							<div class="col">
								<button v-on:click="reply" v-bind:id="post.id" type="button" class="btn btn-dark flex-fill w-50">Reply</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="row text-center mt-2 fixed-bottom">
			<div class="col">
				<form>
					<input type="textarea">
					<input type="submit">
				</form>
			</div>
		</section>
		
    </div>
</template>
<script>
	import User from '../apis/User';
	import Csrf from '../apis/Csrf';
	export default {
		props : ['title','message','error'],
		data() {
			return {
				posts: ''
			}
		},
		mounted() {		
				Csrf.getCookie().then(() => {
					User.getPosts({
						_method: 'POST',
						token: sessionStorage.getItem('token')
					}, 
						sessionStorage.getItem('token')
					)
					.then(response => {
						console.log(response);
						this.posts = response.data.posts;
					})
					.catch(error => {
						console.log("error");
					});
				});
				
				
		},
		methods: {
			logout() {
				User.logout({
					_method: 'POST', token: sessionStorage.getItem('token')
				}, 
					sessionStorage.getItem('token')
				)
				.then((response) => {
					sessionStorage.removeItem('token');
					this.$router.push('loginForm');
				});
			},
			reply(){}
		}
	}
</script>
<style scoped>
</style>