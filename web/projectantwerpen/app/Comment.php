<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable =  ['fk_user', 'fk_project','comment'];
	public function project(){
		return $this->belongsTo('App\Project');
	}
	public function user(){
		return $this->belongsTo('App\User', 'fk_user');
	}
}
