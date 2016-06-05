<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Users_project;
use App\Comment;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class IndividualProjectController extends Controller
{
    public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		//$this->middleware('auth');
	}

	public function index($id) {
		
		$project = Project::find($id);
		$likes = $project->likes($id);
		$dislikes = $project->dislikes($id);
		$comments = $project->comments($id)->with('user')->get();
		$data = array('comments' => $comments , 'project' => $project, 'likes' => $likes, 'dislikes' => $dislikes);
		return view('projects.individual_project', ['id' => $project->id])->with($data);
	}

	public function like($id) {
		$project = Project::find($id);
		$user_id = Auth::user()->id;
		$like = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', true)->first();
		$dislike = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', false)->first();
		var_dump(('like'));
		if($dislike){

			$dislike->delete();
			$users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => true]);
			return Redirect::back();
		}
		elseif($like){
			return Redirect::back();
		}
		elseif(!$like && !$dislike){
			$users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => true]);
			return Redirect::back();
		}
		$likes = $project->likes($id);
		$dislikes = $project->dislikes($id);
		$comments = $project->comments($id)->with('user')->get();
		$data = array('comments' => $comments , 'project' => $project, 'likes' => $likes, 'dislikes' => $dislikes);
		return view('projects.individual_project', ['id' => $project->id])->with($data);
	}

	public function dislike($id) {
		$project = Project::find($id);
		$user_id = Auth::user()->id;

		$like = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', true)->first();
		$dislike = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', false)->first();
		if($like){
			$like->delete();
			$users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => false]);
			return Redirect::back();
		}
		elseif($dislike){
			return Redirect::back();
		}
		else{
			$users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => false]);
			return Redirect::back();
		}
		$likes = $project->likes($id);
		$dislikes = $project->dislikes($id);
		$comments = $project->comments($id)->with('user')->get();
		$data = array('comments' => $comments , 'project' => $project, 'likes' => $likes, 'dislikes' => $dislikes);
		return view('projects.individual_project', ['id' => $project->id])->with($data);
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

		return Redirect::back();
	}
}
