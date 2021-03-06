<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use App\Comment;
use App\Users_project;
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
       		$user = User::create(array('name' => $credentials['name'], 'email' => $credentials['email'], 'password' => Hash::make($credentials['password']), 'type_of_user' => 'regular', 'level' => '1', 'rank' => 'Level I', 'path_rank_image' => 'level1.psd', 'coin_multiplier' => 1.00, 'XP' => 0, 'coins' => 0, 'a_points' => 0 ));
   		} catch (Exception $e) {
       		return response()->json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
   		}

   		$token = JWTAuth::fromUser($user);

   		return compact('token');
  	}

    public function getUserInfo(){
      $user = JWTAuth::parseToken()->authenticate();
      return response(["user" => $user]);
    }

    public function setCoins($coins){
        $user = JWTAuth::parseToken()->authenticate();
        $user->coins = $coins;
        $user->save();
        return response(["message" => $coins . " coins"]);
    }

    public function setXP($xp){
        $user = JWTAuth::parseToken()->authenticate();
        $user->XP = $user->XP + $xp;
        $user->save();
        return response(["message" => $xp . " xp added"]);
    }

    public function setLevel($level){
        $user = JWTAuth::parseToken()->authenticate();
        $user->level = $level;
        $user->save();
        return response([ "message" => "achieved ".$user->level]);
    }

    public function changeImage($path){
      $user = JWTAuth::parseToken()->authenticate();
      $user->path_rank_image = $path;
      $user->save();
      return response(["message" => "path changed to: ".$path]);
    }

    public function setRank($rank){
      $user = JWTAuth::parseToken()->authenticate();
      $user->rank = $rank;
      $user->save();
      return response(["message" => "rank changed to: ".$user->rank]);
    }

    public function setMultiplier($multiplier){
      $user = JWTAuth::parseToken()->authenticate();
      $user->coin_multiplier = $multiplier;
      $user->save();
      return response(["message" => "multiplier changed to: ".$user->coin_multiplier]);
    }

    public function set_a_points($points){
      $user = JWTAuth::parseToken()->authenticate();
      $user->a_points = $points;
      $user->save();
      return response(["message" => $user->a_points. " total"]);
    }
    public function getLikes_Dislikes($id){
      $project = Project::find($id);
      $likes = $project->likes($id);
      $dislikes = $project->dislikes($id);
      return response(['likes' => $likes, 'dislikes' => $dislikes]);
    }

    public function like($id){
      $project = Project::find($id);
      $user = JWTAuth::parseToken()->authenticate();
      $user_id = $user->id;
      $like = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', true)->first();
      $dislike = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', false)->first();
      if($dislike){
        $dislike->delete();
        $users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => true]);
        return response('deleted dislike, like created');
      }
      elseif($like){
        return response('already liked');
      }
      elseif(!$like && !$dislike){
        $users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => true]);
        return response('like created');
      }
    }
    public function dislike($id){
      $project = Project::find($id);
      $user = JWTAuth::parseToken()->authenticate();
      $user_id = $user->id;
      $like = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', true)->first();
      $dislike = Users_project::where('fk_user', $user_id)->where('fk_project', $id)->where('like', false)->first();
      if($like){
        $like->delete();
        $users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => false]);
        return response('deleted like, dislike created');
      }
      elseif($dislike){
        return response('already disliked');
      }
      elseif(!$like && !$dislike){
        $users_project = Users_project::create(['fk_user' => $user_id, 'fk_project' => $id, 'like' => false]);
        return response('dislike created');
      }
    }

    public function setBoughtLikeUpgrade(){
      $user = JWTAuth::parseToken()->authenticate();
      $user->boughtLikeUpgrade = true;
      $user->save();
      return response('Like upgrade bought');
    }

    public function setBoughtDislikeUpgrade(){
      $user = JWTAuth::parseToken()->authenticate();
      $user->boughtDislikeUpgrade = true;
      $user->save();
      return respone('Dislike upgrade bought ');
    }
    public function setBoughtCoinDoubler(){
      $user = JWTAuth::parseToken()->authenticate();
      $user->boughtCoinDoubler = true;
      $user->save();
      return response('Coin doubler bought');
    }
    public function setBoughtExpDoubler(){
      $user = JWTAuth::parseToken()->authenticate();
      $user->boughtExpDoubler = true;
      $user->save();
      return response('Exp doubler bought');
    }
    public function setExpPerLike($int){
      $user = JWTAuth::parseToken()->authenticate();
      $user->expPerLike = $int;
      $user->save();
      return response('Exp per like set to:' . $user->expPerLike);
    }
    public function setExpPerDislike($int){
      $user = JWTAuth::parseToken()->authenticate();
      $user->expPerDislike = $int;
      $user->save();
      return response('Exp per dislike set to:' . $user->expPerDislike);
    }
    public function setCoinsPerLike($int){
      $user = JWTAuth::parseToken()->authenticate();
      $user->coinsPerLike = $int;
      $user->save();
      return response('Coins per like set to:' . $user->coinsPerLike);
    }
    public function setCoinsPerDislike($int){
      $user = JWTAuth::parseToken()->authenticate();
      $user->coinsPerDislike = $int;
      $user->save();
      return response('Coins per dislike set to:' . $user->coinsPerDislike);
    }
}
