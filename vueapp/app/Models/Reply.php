<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

	protected $table = 'replies';
	protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_post_id', 'name', 'postText', 'date'
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
	
	public function post()
    {
        return $this->belongsTo('App\Models\Post', 'target_post_id', 'post_id');
    }
}
