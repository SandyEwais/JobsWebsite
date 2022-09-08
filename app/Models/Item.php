<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['title' ,'user_id','location','company','tags','description','email','website','logo'];
    
    public function scopeFilter($query,array $filter){
        if($filter['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }
        if($filter['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
                  ->orwhere('tags','like','%'.request('search').'%')
                  ->orwhere('description','like','%'.request('search').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
