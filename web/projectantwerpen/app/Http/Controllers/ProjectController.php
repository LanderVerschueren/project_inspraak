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
			$phases = $request->input('phase');
			$views = $request->input('views');
			if(isset($types)){
				foreach($types as $type){
					$query->orWhere('category', '=', $type);			
				}
			}
			if(isset($phases)){
				foreach($phases as $phase){
					$query->orWhere('phase', '=', $phase);
				}
			}
			if(isset($views)){
				foreach($views as $view){
					if($view == 'minder_dan_100'){
						$query->orWhere('view_amount', '<', 100);
					}
					if($view == '100_1000'){
						$query->orWhereBetween('view_amount', array(100,1000));
					}
					if($view == 'meer_dan_1000'){
						$query->orWhere('view_amount', '>', 1000);
					}
				}
			}
		})->get();
		$data = array('types' => $request->input('type'), 'fases' => $request->input('fase'), 'views' => $request->input('views') );

		$request->flash();

		return view('projects/projects', ['projects' => $projects]);
	}
}
