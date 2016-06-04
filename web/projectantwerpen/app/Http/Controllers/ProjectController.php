<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		//$this->middleware('auth');
	}

	public function index(){
		$projects = Project::all();
		return view('projects/projects', ['projects' => $projects]);
	}

	public function filter(Request $request) {
		
		$projects = Project::where(function($query) use($request){
			
			$types = $request->input('type');
			$fases = $request->input('fase');
			$likes = $request->input('likes');
			if(isset($types)){
				foreach($types as $type){
					$query->orWhere('category', '=', $type);			
				}
			}
			if(isset($fases)){
				foreach($fases as $fase){
					$query->orWhere('fase', '=', $fase);
				}
			}
			if(isset($likes)){
				foreach($likes as $like){
					if($like == 'minder_dan_100'){
						$query->orWhere('likes', '<', 100);
					}
					if($like == '100_1000'){
						$query->orWhereBetween('likes', array(100,1000));
					}
					if($like == 'meer_dan_1000'){
						$query->orWhere('likes', '>', 1000);
					}
				}
			}
		})->get();
		$data = array('types' => $request->input('type'), 'fases' => $request->input('fase'), 'likes' => $request->input('likes') );

		$request->flash();

		return view('projects/projects', ['projects' => $projects]);
	}
}
