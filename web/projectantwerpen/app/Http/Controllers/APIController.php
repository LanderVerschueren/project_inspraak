<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use App\Comment;
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

    public function getComments($id){
      $comments = Comment::where(function($query) use($id){
        $query->where('fk_project', '=', $id);
      })->get();

      
      foreach($comments as $comment){
          if($comment->fk_user != null){
            $comment->push(['user' => $comment->user->name]);
          }
          else{
            $comment->push(['user' => "Anoniem"]);
          }
      }

      $all = array('comments' => $comments);

      return response()->json($all);
    }

    public function placeComment($id, Request $request){
      $comment = $request->input('text');
      $user_id = $request->input('user_id');
      if($user_id == 0){
        $user_id = null;
      }
      Comment::create(array('fk_user' => $user_id, 'fk_project' => $id, 'comment' => $comment ));
      return response('comment created');
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
        return compact('token');
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
       		$user = User::create(array('name' => $credentials['name'], 'email' => $credentials['email'], 'password' => Hash::make($credentials['password']), 'type_of_user' => 'regular', 'level' => '1', 'rank' => 'Level I', 'path_rank_image' => 'level1.psd', 'coin_multiplier' => 1.00));
   		} catch (Exception $e) {
       		return response()->json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
   		}

   		$token = JWTAuth::fromUser($user);

   		return compact('token');
  	}

    public function vote_like($id) {
      $project = Project::find($id);
      
      $project->increment('likes');
      $project->save();

      return response('liked');
    }
  
    public function vote_dislike($id) {
      $project = Project::find($id);
        
      $project->increment('dislikes');
      $project->save();

      return response('disliked');
    }

    public function getUserInfo(){
      $user = JWTAuth::parseToken()->authenticate();
      $newToken = JWTAuth::parseToken()->refresh();
      return response(["user" => $user, "token" => $newToken]);
    }

    public function addCoins($coins){
        $user = JWTAuth::parseToken()->authenticate();
        $user->coins = $user->coins + $coins;
        $user->save();
        $newToken = JWTAuth::parseToken()->refresh();
        return response(["message" => $coins . " coins added", "token" => $newToken]);
    }

    public function removeCoins($coins){
        $user = JWTAuth::parseToken()->authenticate();
        $user->coins = $user->coins - $coins;
        $user->save();
        $newToken = JWTAuth::parseToken()->refresh();
        return response(["message" => $coins . " coins removed", "token" => $newToken]);
    }

    public function addXP($xp){
        $user = JWTAuth::parseToken()->authenticate();
        $user->XP = $user->XP + $xp;
        $user->save();
        $newToken = JWTAuth::parseToken()->refresh();
        return response(["message" => $xp . " xp added", "token" => $newToken]);
    }

    public function addLevel(){
        $user = JWTAuth::parseToken()->authenticate();
        $user->increment('level');
        $user->save();
        $newToken = JWTAuth::parseToken()->refresh();
        return response([ "message" => "achieved ".$user->level, "token" => $newToken]);
    }

    public function changeImage($path){
      $user = JWTAuth::parseToken()->authenticate();
      $user->path_rank_image = $path;
      $user->save();
      $newToken = JWTAuth::parseToken()->refresh();
      return response(["message" => "path changed to: ".$path, "token" => $newToken]);
    }

    public function changeRank($rank){
      $user = JWTAuth::parseToken()->authenticate();
      $user->rank = $rank;
      $user->save();
      $newToken = JWTAuth::parseToken()->refresh();
      return response(["message" => "rank changed to: ".$user->rank, "token" => $newToken]);
    }

    public function changeMultiplier($multiplier){
      $user = JWTAuth::parseToken()->authenticate();
      $user->coin_multiplier = $multiplier;
      $user->save();
      $newToken = JWTAuth::parseToken()->refresh();
      return response(["message" => "multiplier changed to: ".$user->coin_multiplier, "token" => $newToken]);
    }

    public function add_a_points($points){
      $user = JWTAuth::parseToken()->authenticate();
      $user->a_points = $user->a_points + $points;
      $user->save();
      $newToken = JWTAuth::parseToken()->refresh();
      return response(["message" => $user->a_points. " total", "token" => $newToken]);
    }

    public function remove_a_points($points){
      $user = JWTAuth::parseToken()->authenticate();
      $user->a_points = $user->a_points - $points;
      $user->save();
      $newToken = JWTAuth::parseToken()->refresh();
      return response(["message" => $user->a_points. " total", "token" => $newToken]);
    }
}
