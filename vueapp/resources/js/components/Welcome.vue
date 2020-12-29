<template>
    <div class="col d-flex flex-column text-light">
		<nav class="row">
			<div class="col btn-group d-flex" role="group">
				<div class="flex-fill w-100">
					<button v-on:click="logout" type="button" class="btn btn-primary w-100">logout</button>
				</div>	
			</div>				
		</nav>
		
		<div class="text-center mt-2 mb-2">
			<div class="col">
				<h1>Rpg game</h1>
				<h5>Welcome, {{username}}!</h5>
			</div>
		</div>
		<div class="d-flex flex-column mt-2 align-items-center">
			<div class="mb-2 mt-2 w-75">
				<button v-on:click="newGame" id="startButton" type="button" class="btn btn-primary active w-100">New Game</button>
			</div>	
			<div v-if="!!saveGame" class="mb-2 mt-2 w-75">	
				<button v-on:click="loadGame" id="continueButton" type="button" class="btn btn-primary active w-100">Continue</button>
			</div>
			<div class="mb-2 mt-2 w-75">	
				<button v-on:click="listScores" type="button" class="btn btn-primary active w-100">Scores</button>
			</div>
					
		</div>	
    </div>
</template>
<script>
	import User from '../apis/User';
	export default {
		props : ['title','message','error'],
		data() {
			return {
				username: '',
				saveGame: ''
			}
		},
		mounted() { 
			User.getData({_method: 'POST', token: sessionStorage.getItem('token')}, sessionStorage.getItem('token')).then((response) => {
				console.log(response.data);
				console.log(response.data.name);
				this.username = response.data.name;
				if(response.data.saveGame != null)
					saveGame = true;
			});
		},
		methods: {
			loadGame(){},
			newGame() {
				this.$router.push('characterBuilder')
			},
			listScores() {
				this.$router.push('listScores')
			},
			logout() {
				console.log("logging out");
				User.logout({_method: 'POST', token: sessionStorage.getItem('token')}, sessionStorage.getItem('token')).then((response) => {
					sessionStorage.removeItem('token');
					this.$router.push('loginForm');
				});
			}
		}
	}
</script>
<style scoped>
</style>