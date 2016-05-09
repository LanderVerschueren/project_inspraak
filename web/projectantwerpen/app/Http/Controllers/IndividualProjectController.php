<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndividualProjectController extends Controller
{
    public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		//$this->middleware('auth');
	}

	public function index() {
		
		/*$projects = DB::table('projects')->get();

		return view('projects/projects', ['projects' => $projects]);*/

		return view('projects/individual_project');
	}
}
