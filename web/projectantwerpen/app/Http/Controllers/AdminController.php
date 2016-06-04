<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use File;

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

	public function updateProject($id) {
		$project = Project::find($id);
		return view('projects.update_project', ['project' => $project]);
	}

	public function add(Request $request) {
		$title 			= $request->input('title');
		$title			= strtolower($title);
		$image	 		= $request->file('pic');
		$date 			= date("Y-m-d", strtotime($request->input('date')));
		$cost 			= $request->input('cost');
		$category 		= $request->input('category');
		$question 		= $request->input('question');
		$fase 			= $request->input('fase');
		$description 	= $request->input('description');
		$pic_name = str_replace(' ', '_', $title);
		File::makeDirectory('images/' . $title);
		$destinationPath = $pic_name .'.'. $image->getClientOriginalExtension();
		$image->move(public_path('images/' . $title), $destinationPath);
		var_dump($destinationPath);

		Project::insert([
			'title' 		=> $title,
			'image_name' 	=> $destinationPath,
			'date' 			=> $date,
			'cost' 			=> $cost,
			'category' 		=> $category,
			'question'		=> $question,
			'fase' 			=> $fase,
			'description' 	=> $description
		]);

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}

	public function update(Request $request, $id) {
		$project = Project::find($id);

		$title 			= $request->input('title');
		$title			= strtolower($title);
		$image	 		= $request->file('pic');
		$date 			= date("Y-m-d", strtotime($request->input('date')));
		$cost 			= $request->input('cost');
		$category 		= $request->input('category');
		$question 		= $request->input('question');
		$fase 			= $request->input('fase');
		$description 	= $request->input('description');

		File::deleteDirectory(public_path('images/' . $project->title));

		$pic_name = str_replace(' ', '_', $title);
		File::makeDirectory('images/' . $title);
		$destinationPath = $pic_name .'.'. $image->getClientOriginalExtension();
		$image->move(public_path('images/' . $title), $destinationPath);

		Project::where('id', '=', $id)->update([
           	'title' 		=> $title,
			'image_name' 	=> $destinationPath,
			'date' 			=> $date,
			'cost' 			=> $cost,
			'category' 		=> $category,
			'question'		=> $question,
			'fase' 			=> $fase,
			'description' 	=> $description
        ]);

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}

	public function delete_project( $id ) {
		$project = Project::find($id);
		var_dump($project->title);
		File::deleteDirectory(public_path('images/' . $project->title));
		$project->delete();

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}
}
