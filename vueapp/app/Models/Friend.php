<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model{
	
	protected $table = 'friends';
	protected $primaryKey = 'id';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name', 'score', 'rpg_game_user_id'
    ];
	
    public function user() {
		return $this->belongsTo('App\Models\rpgGameUser', 'rpg_game_user_id');	
	}	
}