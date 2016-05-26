<?php

namespace App\Http\Controllers;

use Request;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class SearchController extends Controller
{
    public function __construct() {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function index() {

        $search = Request::input('q');
        $projects = Project::SearchByKeyword($search)->get();
        return view('projects/projects', ['projects' => $projects]);
    }
}
