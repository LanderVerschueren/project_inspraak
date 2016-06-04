<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Users_project;
class Project extends Model
{
    protected $table = "projects";
    protected $fillable = ['title', 'category', 'description', 'date', 'cost', 'phase', 'question', 'image_name', 'location', 'view_amount'];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("titel", "LIKE","%$keyword%")
                    ->orWhere("categorie", "LIKE", "%$keyword%")
                    ->orWhere("locatie", "LIKE", "%$keyword%")
                    ->orWhere("uitleg", "LIKE", "%$keyword%");
            });
        }
        
        return $query;
    }
    public function comments($id) {
       	return Comment::where('fk_project', $id);
    }

    public function likes($id){
        return Users_project::where(function($query) use($id){
            $query->where('fk_project', '=', $id)->where('like', true);
        })->count();
    }
    public function dislikes($id){
        return Users_project::where(function($query) use($id){
            $query->where('fk_project', '=', $id)->where('like', false);
        })->count();
    }
}
