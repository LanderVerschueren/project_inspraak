<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class APIController extends Controller
{
    public function request(){
    	$projects = Project::all();
    	return response()->json($projects);
    }
}
