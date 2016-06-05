<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use File;
use Redirect;

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
		$image	 		= $request->file('pic');
		$date 			= date("Y-m-d", strtotime($request->input('date')));
		$cost 			= $request->input('cost');
		$category 		= $request->input('category');
		$question 		= $request->input('question');
		$phase 			= $request->input('phase');
		$description 	= $request->input('description');

		$validator = Validator::make([ $image ], ['mimes:gif,jpg,jpeg,bmp,png', 'image.required']);

		if ($validator->fails()) {
            return response()->json(['error' => 'Bestand moet een extensie :gif,jpg,jpeg,bmp,png hebben '], 200);
        }

		$pic_name = str_replace(' ', '_', $title);

		File::makeDirectory('images/' . $title);
		$destination_path = public_path('images/' . $title);
		$image_name = $pic_name .'.'. $image->getClientOriginalExtension();

		$image->move($destination_path, $image_name);

		Project::insert([
			'title' 		=> $title,
			'image_name' 	=> $image_name,
			'date' 			=> $date,
			'cost' 			=> $cost,
			'category' 		=> $category,
			'question'		=> $question,
			'phase' 		=> $phase,
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
		$phase 			= $request->input('phase');
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
			'phase' 		=> $phase,
			'description' 	=> $description
        ]);

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}

	public function delete_project( $id ) {
		$project = Project::find($id);
		
		File::deleteDirectory(public_path('images/' . $project->title));
		$project->delete();

		$projects = Project::all();

		return view('projects.projectslist', ['projects' => $projects]);
	}

	public function deleteComment($id){

		$comment = Comment::find($id);
		$comment->delete();

		return Redirect::back();
	}
}
