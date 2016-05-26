<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_project extends Model
{
	protected $fillable = ['fk_user', 'fk_project'];
}
