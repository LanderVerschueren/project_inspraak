<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class APIController extends Controller
{
    public function requestProjects(){
    	$projects = Project::all();
      $all = array('projects' => $projects );

    	return response()->json($all);
    }

    public function getComments(){
      $comments = Comment::all();
      $all = array('comments' => $comments);

      return response()->json($all);
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
  		$credentials = $request->only('name','email', 'password');

   		try {
       		$user = User::create(array('name' => $credentials['name'], 'email' => $credentials['email'], 'password' => Hash::make($credentials['password']), 'type_of_user' => 'regular'));
   		} catch (Exception $e) {
       		return response()->json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
   		}

   		$token = JWTAuth::fromUser($user);

   		return response()->json(compact('token'));
  	}
}
