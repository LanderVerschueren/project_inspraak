<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;
use App\Http\Controllers\Controller;
class ProjectController extends Controller
{
	public function __construct(Request $request) {
		//Only when someone needs to be authenticated to acces the page
		//$this->middleware('auth');
		$this->request = $request;
	}
	public function index() {
		
		/*$projects = Project::where(function($query){
				$types = $request->get('type');
				foreach ($types as $type) {
					$query->where('categorie', '=', $type);
				}
				
		})->paginate(3);*/
		$projects = Project::all();
		return view('/projects/projects', compact(['projects']));
	}
}
