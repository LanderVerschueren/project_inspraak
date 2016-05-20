<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use App\Http\Controllers\Controller;
use Request;

class ProjectController extends Controller
{
	public function __construct() {
		//Only when someone needs to be authenticated to acces the page
		//$this->middleware('auth');
	}

	public function index() {
		$projects = Project::where(function($query){
			$types = Request::input('type');
			$fases = Request::input('fase');
			$likes = Request::input('likes');
			if(isset($types)){
				foreach($types as $type){
					$query->orWhere('categorie', '=', $type);			}
			}
			if(isset($fases)){
				foreach($fases as $fase){
					$query->orWhere('fase', '=', $fase);
				}
			}
			if(isset($likes)){
				foreach($likes as $like){
					if($like == '<100'){
						$query->where('likes', '=<', 100);
					}
					if($like == '100_1000'){
						$query->whereBetween('likes', array(100,1000));
					}
					if($like == '>1000'){
						$query->where('likes', '>=', 1000);
					}
				}
			}
		})->get();
		return view('projects/projects', ['projects' => $projects]);
	}
}
