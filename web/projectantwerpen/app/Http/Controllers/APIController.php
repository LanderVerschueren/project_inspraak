<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Log;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class APIController extends Controller
{
	public function _construct()
	{
		if ((\App::environment() == 'testing') && array_key_exists("HTTP_AUTHORIZATION",  \Request::server())) {
        	JWTAuth::setRequest(\Route::getCurrentRequest());
    	}
	}
    public function requestProjects(){
    	$json_projects = Project::all()->toJson();
    	$json = preg_replace('/([{,])(\s*)([A-Za-z0-9_\-]+?)\s*:/','$1"$3":', $json_projects);
    	return $json;
    }

    public function login(Request $request){
    	$credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function logout(Request $request){
        $this->validate($request, [
            'token' => 'required' 
        ]);
        
        JWTAuth::invalidate($request->input('token'));
    }

    public function register(Request $request)
  	{	
  		$credentials = $request->only('email', 'password');

   		try {
       		$user = User::create($credentials);
   		} catch (Exception $e) {
       		return response()->json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
   		}

   		$token = JWTAuth::fromUser($user);

   		return response()->json(compact('token'));
  	}
}

