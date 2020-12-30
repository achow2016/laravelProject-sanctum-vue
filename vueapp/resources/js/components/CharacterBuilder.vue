<template>
    <div class="col d-flex flex-column text-light">
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
						<p>Assign 12 points, +5% bonus per point</p>
					</div>					
				</div>
			
				<div class="row">
					<div class="col">
						<div class="row"><p class="mx-auto">Strength</p></div><br>
						<div class="row"><p class="mx-auto">Endurance</p></div><br>
						<div class="row"><p class="mx-auto">Life</p></div><br>
					</div>
					<div class="col">
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('strength', $event)" type="button" class="btn btn-danger" >-</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('endurance', $event)" type="button" class="btn btn-danger" >-</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('life', $event)" type="button" class="btn btn-danger" >-</button>
						</div><br>							
					</div>
					<div class="col">
						<div class="row justify-content-center">
							<p>{{strength}}</p>
						</div><br>
						<div class="row justify-content-center">
							<p>{{endurance}}</p>
						</div><br>
						<div class="row justify-content-center">
							<p>{{life}}</p>
						</div><br>					
					</div>
					<div class="col">
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('strength', $event)"  type="button" class="btn btn-success" >+</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('endurance', $event)"  type="button" class="btn btn-success" >+</button>
						</div><br>
						<div class="row justify-content-center">
							<button v-on:click="alterAlloc('life', $event)" type="button" class="btn btn-success" >+</button>
						</div><br>							
					</div>
				</div>
				
				<div class="row mb-2">
					<div class="col">
						<input type="text" class="form-control" id="name" placeholder="name">
					</div>	
				</div>
	
				<div class="row mb-2">
					<div class="col">
						<select class="form-control" name="gameClass" id="gameClass">
							<option>warrior</option>
						</select>
					</div>	
				</div>
				
				<div class="row">
					<div class="col text-center">
						<label for="race">Choose a race:</label>
						<select name="race" id="race">
							<option value="human">human</option>
							<option value="android">android</option>
						</select>	
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
							<button id="completeConfig" type="button" class="w-100 btn btn-primary active">Create</button>
						</div>
					</div>	
				</div>	
			</div>
		</div>	
    </div>
</template>
<script>
	import User from '../apis/User';
	export default {
		props : [],
		data() {
			return {
				username: '',
				saveGame: '',
				strength: 0,
				endurance: 0,
				life: 0,
				totalAlloc: 0
			}
		},
		mounted() { 
			User.getData({_method: 'POST', token: sessionStorage.getItem('token')}, sessionStorage.getItem('token')).then((response) => {
				console.log(response.data);
				this.username = response.data.name;
				if(response.data.saveGame != null)
					saveGame = true;
			});
		},
		methods: {
			alterAlloc: function(param, event) {
				let direction = event.target.innerText;
				switch(param) {
					case('strength'):
						if(direction == '-' && this.totalAlloc >= 1) {
							this.strength--;
							this.totalAlloc--;
						}
						else if(direction == '+' && this.totalAlloc <= 11) {
							this.strength++;
							this.totalAlloc++;
						}
						break;
					case('endurance'):
						if(direction == '-' && this.totalAlloc >= 1) {
							this.endurance--;
							this.totalAlloc--;
						}
						else if(direction == '+' && this.totalAlloc <= 11) {
							this.endurance++;
							this.totalAlloc++;
						}
						break;
					case('life'):
						if(direction == '-' && this.totalAlloc >= 1) {
							this.life--;
							this.totalAlloc--;
						}
						else if(direction == '+' && this.totalAlloc <= 11) {
							this.life++;
							this.totalAlloc++;
						}
						break;
					default:
						break;	
				}
			}
		}
	}
</script>
<style scoped>
</style>