<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laranote extends Model
{
    use HasFactory;

    protected $fillable = ['title','tags','note','user_id'];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query -> where('title','like','%'.request('search').'%')->orWhere('tags','like','%'.request('search').'%');
        }

        if($filters['tag'] ?? false){
            $query -> where('tags', 'like', '%'.request('tag').'%');
        }
    }
}
