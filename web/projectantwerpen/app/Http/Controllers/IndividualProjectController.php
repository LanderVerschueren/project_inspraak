<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class IndividualProjectController extends Controller
{
    public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		//$this->middleware('auth');
	}

	public function index($id) {
		
		$project = Project::find($id);

		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);

	}
	public function follow($id) {
		
		$project = Project::find($id);
		$user_id = Auth::user()->id;
		DB::insert('insert into users_projects (fk_user, fk_project) values (?, ?)',[$user_id, $id]);

		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);

	}
	public function unfollow($id) {
		
		$project = Project::find($id);
		$user_id = Auth::user()->id;
		DB::table('users_projects')->where('fk_user','=',$user_id)->where('fk_project','=',$id)->delete();

		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);

	}

	public function voting($id) {
		var_dump($id);
		$project = Project::find($id);
		DB::table('projects')->increment('likes');

		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);		
	}
}
