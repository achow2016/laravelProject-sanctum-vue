<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CharacterRaceFactory;

class CharacterRace extends Model
{
	use HasFactory;
	
	protected $table = 'character_race';
	protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "race", "health", "attack", "stamina", "staminaRegen", "healthRegen", 
		"agility", "avatar" 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];
	
	public function character() {
		return $this->belongsTo('App\Models\Character', 'id');	
	}	
}
