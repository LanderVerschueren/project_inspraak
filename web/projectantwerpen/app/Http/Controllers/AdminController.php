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
		$image	 		= $request->input('pic');
		$date 			= $request->input('date');
		$cost 			= $request->input('cost');
		$category 		= $request->input('category');
		$question 		= $request->input('question');
		$fase 			= $request->input('fase');
		$description 	= $request->input('description');

		var_dump($request->input('pic'));

		Project::create(
			array(
				'titel' 		=> $title,
				'fotonaam' 		=> $image,
				'einddatum' 	=> $date,
				'kostprijs' 	=> $cost,
				'categorie' 	=> $category,
				'vraag'			=> $question,
				'fase' 			=> $fase,
				'uitleg' 		=> $description
			)
		);

		/*$image_to_move = Input::file('pic');
		$validator = Validator::make(
			[$image_to_move], 
			['mimes:gif,jpg,jpeg,bmp,png', 'image_to_move.required']
		);

		if ($validator->fails()) {
            return response()->json(['error' => 'Bestand moet een extensie :gif,jpg,jpeg,bmp,png hebben '], 200);
        }*/

        $destinationPath = 'images';

        
		$request->file('pic')->move($destinationPath, $image);

		/*if (!$image_to_move->move($destinationPath, $image_to_move->getClientOriginalName())) {
            return $validator->errors(
            	['message' => 'Er is iets foutgelopen bij het uploaden van het bestand.', 'code' => 400]
            );
        }
		
		$image_to_move->move($destinationPath, $image_to_move->getClientOriginalName());*/



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
