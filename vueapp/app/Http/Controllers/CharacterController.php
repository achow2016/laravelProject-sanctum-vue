<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//models
use App\Models\Character;
use App\Models\CharacterRace;
use App\Models\User;

use DateTime;

class CharacterController extends Controller {

	public function createCharacter(Request $request) 
	{
		$request->validate([
			'username' => 'required',
			'characterName' => 'required',
			'strengthAlloc' => 'required|numeric|max:12',
			'enduranceAlloc' => 'required|numeric|max:12',
			'lifeAlloc' => 'required|numeric|max:12',
			'totalAlloc' => 'required|numeric|max:12',
			'race' => 'required',
			'gameClass' => 'required',
		]);
		
		$user = User::where('name', $request->user()->name)->first();
		$characterRace = CharacterRace::where('race', $request->race)->first();
		
		if (!$user) {
            throw ValidationException::withMessages([
                'message' => ['database error, user does not exist.'],
            ]);
        }			
			
		$character = new Character();
		$character->setAttribute('raceId', $characterRace->id);
		$character->setAttribute('ownerUser', $user->id);
		$character->setAttribute('characterName', $request->characterName);
		$character->setAttribute('gameClass', $request->gameClass);
		$character->setAttribute('health', $characterRace->health + $request->lifeAlloc);
		$character->setAttribute('healthRegen', $characterRace->healthRegen);
		$character->setAttribute('stamina', $characterRace->stamina  + $request->enduranceAlloc);
		$character->setAttribute('staminaRegen', $characterRace->staminaRegen);
		$character->setAttribute('agility', $characterRace->agility);
		$character->setAttribute('attack', $characterRace->attack  + $request->strengthAlloc);
		$character->setAttribute('health', $characterRace->health);
		$character->save();
		//return response(['character' => $character], 200);
		//then go to story after creating character
		
	}
	
}
?>