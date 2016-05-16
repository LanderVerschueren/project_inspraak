<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		$this->middleware('admin');
	}

	public function index() {
		
		$projects = Project::all();

		return view('projects/projectslist', ['projects' => $projects]);
	}
}
