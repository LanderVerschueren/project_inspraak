<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Users_project;
use App\Comment;
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
		$comments = Project::comments($id)->with('user')->get();
		$data = array('comments' => $comments , 'project' => $project);
		return view('projects.individual_project', ['id' => $project->id])->with($data);
	}

	public function follow($id) {
		$project = Project::find($id);
		if(Auth::user()){
			$user_id = Auth::user()->id;
			$users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id]);
		}

		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);
	}

	public function unfollow($id) {
		
		$project = Project::find($id);
		if(Auth::user()){
			$user_id = Auth::user()->id;
			$users_project = Users_project::where('fk_project', $id)->where('fk_user', $user_id)->delete();
		}
		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);
	}

	public function placeComment($id, Request $request)
	{
		$text = $request->input('comment');
		if(Auth::User()){
			$user_id = Auth::User()->id;
		}
		else{
			$user_id = null;
		}
		
		$comment = Comment::create(array('fk_project' => $id,'fk_user' => $user_id, 'comment' => $text ));
		$project = Project::find($id);
		$comments = Project::comments($id)->with('user')->get();
		$data = array('comments' => $comments , 'project' => $project);

		return view('projects.individual_project', ['id' => $project->id])->with($data);
	}

	public function voten($id) {
		$project = Project::find($id);
		$project->update('projects')->increment('likes');

		return view('projects.individual_project', ['id' => $project->id])->with('project', $project);
	}
}
