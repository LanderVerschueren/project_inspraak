<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_project extends Model
{
	protected $fillable = ['fk_user', 'fk_project', 'like'];

	public function user(){
		return $this->belongsTo('App\User', 'fk_user');
	}
	public function project(){
		return $this->belongsTo('App\Project', 'fk_project');
	}
}
