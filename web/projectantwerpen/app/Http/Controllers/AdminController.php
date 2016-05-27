<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		$this->middleware(['auth', 'admin']);
	}

	public function index() {
		
		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}

	public function addProject(Request $request) {
		/*$title = $request->input('title');
		$image = $request->input('pic');
		$date = $request->input('date');
		$cost = $request->input('cost');
		$category = $request->input('category');
		$description = $request->input('description');
		$project = Project::create(array('titel' => $title, 'categorie' => $category, 'uitleg' => $description, 'fotonaam'));*/
		return view('projects.add_project');
	}
}
