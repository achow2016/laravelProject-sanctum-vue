<template>
    <div class="text-light">
		<header class="row">
			<div class="col text-center d-flex">		
				<div class="flex-fill w-33">
					<router-link :to="{ name: 'welcome' }"><button type="button" class="btn btn-dark flex-fill w-100">Home</button></router-link>
				</div>	
				<div class="flex-fill w-33 h-75">
					<h3 class="mt-1">Game Chat</h3>
				</div>	
				<div class="flex-fill w-33">
					<button v-on:click="logout" type="button" class="btn btn-dark flex-fill w-100">Logout</button>
				</div>	
			</div>
		</header>
		
		<section class="row text-center mt-2 mb-2">
			<div class="col">
				<div v-if="!!posts" class="col-sm-12">
					<div v-for="post in posts" v-bind:id="'post' + post.post_id" class="row">
						<div class="float-none w-100">
							<div class="row">
								<div class="col">
									{{post.name}}
								</div>
								<div class="col">
									{{post.date}}
								</div>
							</div>
							<div class="row">
								<div class="col text-truncate d-inline-block" v-bind:id="'post' + post.post_id + '-text'">
									{{post.postText}}
								</div>
							</div>
							<div class="row">
								<div class="col d-flex">
									<button v-on:click="writeReply($event)" v-bind:id="post.post_id" type="button" class="btn btn-dark flex-fill w-50">Reply</button>
									<button v-on:click="toggle($event)" v-bind:id="post.post_id" type="button" class="btn btn-dark flex-fill w-50">Expand</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="row text-center mt-2 fixed-bottom">
			<div id="postContainer" class="col text-center mt-2">
				<div class="col">
					<form>
						<textarea id="postSpace" rows="4" class="w-100"></textarea">
						<button v-on:click="submitPost()" class="btn btn-dark w-100">Make Post</button>
					</form>
				</div>
			</div>	
		</section>
		
		
		<div id="replyContainer" class="float-none text-center mt-2 d-none">
			<div class="col">
				<form>
					<textarea id="replySpace" rows="2" class="w-100"></textarea">
					<button v-on:click="submitReply()" class="btn btn-dark w-100">Submit</button>
				</form>
			</div>
		</div>
		
    </div>
</template>
<script>
	import User from '../apis/User';
	import Csrf from '../apis/Csrf';
	export default {
		props : ['title','message','error'],
		data() {
			return {
				posts: '',
				replyTarget: '',
				replyBoxNode: '',
				replyId: '',
				replyText: ''
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
			writeReply(event){
				this.replyId = event.target.id;	
				if(event.target.innerText == 'Close') {
					this.replyBoxNode = document.getElementById('post' + this.replyId).removeChild(document.getElementById('replyContainer'));
					event.target.innerText = 'Reply'
				}
				else {	
					if(this.replyBoxNode == '')
						//if not displayed yet, appends to parent post
						if(document.getElementById('replyContainer').classList.contains('d-none'))
							document.getElementById('post' + this.replyId).appendChild(document.getElementById('replyContainer'));
						//if displayed on a different post, removed from the parent and move to target
						else {
							this.replyBoxNode = document.getElementById('replyContainer').parentElement.removeChild(document.getElementById('replyContainer'));
							document.getElementById('post' + this.replyId).appendChild(this.replyBoxNode);
							let buttons = document.getElementsByTagName('button');
							for(let i = 0; i < buttons.length; i++) {
								if(buttons[i].textContent == 'Close')
									buttons[i].textContent = 'Reply';
							}
						}
					else {
						document.getElementById('post' + this.replyId).appendChild(this.replyBoxNode);
						let buttons = document.getElementsByTagName('button');
						for(let i = 0; i < buttons.length; i++) {
							if(buttons[i].textContent == 'Close')
								buttons[i].textContent = 'Reply';
						}
					}
					event.target.innerText = 'Close';
					document.getElementById('replyContainer').className = 'col text-center mt-2';
					document.getElementById('replySpace').setAttribute('rows', '4');
					document.getElementById('replySpace').focus();
				}
			},
			submitReply() {
				Csrf.getCookie().then(() => {
					User.makePostReply({
						postId: this.replyId,
						replyText: document.getElementById('replySpace').value
					})
					.then(response => {
					})
					.catch(error => {
						if(error.response.status == 422)
							this.errorList = error.response.data.errors;
					});
				});
			},
			toggle(event) {
				let postId = event.target.id;
				let idTarget = 'post' + postId + '-text';
				if(event.target.innerText == 'Expand') {
					document.getElementById(idTarget).className = 'col d-inline-block';
					event.target.innerText = 'Collapse';
				}	
				else {
					document.getElementById(idTarget).className = 'col text-truncate d-inline-block';
					event.target.innerText = 'Expand';
				}	
			}
		}
	}
</script>
<style scoped>
</style>