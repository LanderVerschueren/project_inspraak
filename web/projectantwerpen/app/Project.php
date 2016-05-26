<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Project extends Model
{
    protected $table = "projects";

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
    public static function comments($id)
        {
        	return Comment::where('fk_project', $id);
        }
}
