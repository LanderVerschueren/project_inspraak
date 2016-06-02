<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

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

	public function addProject() {
		return view('projects.add_project');
	}

	public function add(Request $request) {
		$title 			= $request->input('title');
		$image	 		= $request->file('pic');
		$date 			= date("Y-m-d", strtotime($request->input('date')));
		$cost 			= $request->input('cost');
		$category 		= $request->input('category');
		$question 		= $request->input('question');
		$fase 			= $request->input('fase');
		$description 	= $request->input('description');
		var_dump($request->input('date'));
		$pic_name = str_replace(' ', '_', $title);
		$destinationPath = $pic_name .'.'. $image->getClientOriginalExtension();
		$image->move(public_path('images'), $destinationPath);
		/*Project::create(
			array(
				'titel' 		=> $title,
				'fotonaam' 		=> $destinationPath,
				'einddatum' 	=> $date,
				'kostprijs' 	=> $cost,
				'categorie' 	=> $category,
				'vraag'			=> $question,
				'fase' 			=> $fase,
				'uitleg' 		=> $description
			)
		);*/

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}

	public function delete_project( $id ) {
		$project = Project::find($id);

		$project->delete();

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}
}
