<template>
    <div class="d-flex flex-column text-light">
		<header class="row">
			<div class="col text-center d-flex">		
				<div class="flex-fill w-33">
					<router-link :to="{ name: 'welcome' }"><button type="button" class="btn btn-dark flex-fill w-100">Home</button></router-link>
				</div>	
				<div class="flex-fill w-33 h-75">
					<h3 class="mt-1">Character Builder</h3>
				</div>	
				<div class="flex-fill w-33">
					<button v-on:click="logout" type="button" class="btn btn-dark flex-fill w-100">Logout</button>
				</div>	
			</div>
		</header>
	
		<div class="text-center mt-2 mb-2">
			<div class="col">
				<h5>Rpg game new game</h5>
				<p>Welcome to the character builder, {{username}}!</p>
			</div>
		</div>
		<div class="text-light">
			<div class="col">		
				<div class="row">
					<div class="col text-center">
						<br>
						<p>Assign up to 12 points, +5% bonus per point</p>
					</div>					
				</div>
			
				<div id="allocBox" class="row bg-dark mt-2 mb-4 pt-4">
					<div class="col">
						<div class="row"><p class="mx-auto">Strength</p></div><br>
						<div class="row"><p class="mx-auto">Endurance</p></div><br>
						<div class="row"><p class="mx-auto">Life</p></div><br>
					</div>
					<div class="col">
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('strength', $event)" type="button" class="btn btn-secondary">-</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('endurance', $event)" type="button" class="btn btn-secondary">-</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('life', $event)" type="button" class="btn btn-secondary">-</button>
						</div><br>							
					</div>
					<div class="col">
						<div class="row justify-content-center">
							<p>{{strengthAlloc}}</p>
						</div><br>
						<div class="row justify-content-center">
							<p>{{enduranceAlloc}}</p>
						</div><br>
						<div class="row justify-content-center">
							<p>{{lifeAlloc}}</p>
						</div><br>					
					</div>
					<div class="col">
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('strength', $event)"  type="button" class="btn btn-light">+</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('endurance', $event)"  type="button" class="btn btn-light">+</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('life', $event)" type="button" class="btn btn-light">+</button>
						</div><br>							
					</div>
				</div>
				
				<div class="row mb-2">
					<div class="col text-center">
						<div class="row">
							<div class="col">
								<label for="characterName">Name:</label>
							</div>
						</div>	
						<div class="row">						
							<div class="col">
								<input type="text" class="form-control" id="characterName" placeholder="character name" v-model="characterName">
							</div>	
						</div>
					</div>
				</div>
				
				<div class="row mb-2">
					<div class="col text-center">
						<div class="row">
							<div class="col">
								<label for="gameClass">Game class:</label>
							</div>
						</div>	
						<div class="row">						
							<div class="col">
								<select class="form-control" name="gameClass" id="gameClass" v-model="gameClass" selected="warrior">
									<option value="" selected disabled hidden>choose a class</option>
									<option>warrior</option>
								</select>
							</div>	
						</div>
					</div>
				</div>
				
				<div class="row mb-2">
					<div class="col text-center">
						<div class="row">
							<div class="col">
								<label for="race">Game race:</label>
							</div>
						</div>	
						<div class="row">						
							<div class="col">
								<select class="form-control" name="race" id="race" v-model="race">
									<option value="" selected disabled hidden>choose a race</option>
									<option value="human" selected>human</option>
									<option value="android">android</option>
								</select>	
							</div>	
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col">
						<p id="characterChoice"></p> 
						<p id="raceStats"></p>
					</div>	
				</div>			
				
				<div class="row">
					<div class="col">
						<div class="centered-button">
							<button v-on:click="createCharacter" id="createCharacter" type="button" class="w-100 btn btn-dark active">Create character</button>
						</div>
					</div>	
				</div>	
			</div>
		</div>	
    </div>
</template>
<script>
	import User from '../apis/User';
	import Csrf from '../apis/Csrf';
	export default {
		props : [],
		data() {
			return {
				username: '',
				strengthAlloc: 0,
				enduranceAlloc: 0,
				lifeAlloc: 0,
				totalAlloc: 0,
				race: '',
				gameClass: '',
				characterName: ''
				
			}
		},
		mounted() { 
			User.getData({_method: 'POST', token: sessionStorage.getItem('token')},
				sessionStorage.getItem('token'))
				.then((response) => {
					this.username = response.data.name;
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
			alterAlloc: function(param, event) {
				let direction = event.target.innerText;
				switch(param) {
					case('strength'):
						if(direction == '-' && this.totalAlloc >= 1) {
							this.strengthAlloc--;
							this.totalAlloc--;
						}
						else if(direction == '+' && this.totalAlloc <= 11) {
							this.strengthAlloc++;
							this.totalAlloc++;
						}
						break;
					case('endurance'):
						if(direction == '-' && this.totalAlloc >= 1) {
							this.enduranceAlloc--;
							this.totalAlloc--;
						}
						else if(direction == '+' && this.totalAlloc <= 11) {
							this.enduranceAlloc++;
							this.totalAlloc++;
						}
						break;
					case('life'):
						if(direction == '-' && this.totalAlloc >= 1) {
							this.lifeAlloc--;
							this.totalAlloc--;
						}
						else if(direction == '+' && this.totalAlloc <= 11) {
							this.lifeAlloc++;
							this.totalAlloc++;
						}
						break;
					default:
						break;	
				}
			},
			createCharacter() {
				Csrf.getCookie().then(() => {
					User.createCharacter({
						_method: 'POST',
						token: sessionStorage.getItem('token'),
						username: this.username,
						characterName: this.characterName,
						strengthAlloc: this.strengthAlloc,
						enduranceAlloc: this.enduranceAlloc,
						lifeAlloc: this.lifeAlloc,
						totalAlloc: this.totalAlloc,
						race: this.race,
						gameClass: this.gameClass
						
					},
						sessionStorage.getItem('token')
					)
					.then(response => {
						console.log(response);
					})
					.catch(error => {
						console.log(error);
					});
				});
			}
		}
	}
</script>
<style scoped>
	#allocBox {
		opacity: .7;
	}
</style>