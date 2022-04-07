<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Tests\CreatesApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    use HasFactory;
    // protected $fillable = ['title','excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['category','user'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        // return  $query->where('title', 'like', '%' . $filters['search'] . '%')
        //           ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
        // dd($query);
        // ?? => null collesing operator in php 7
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });
        
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category){
                    $query->where('slug', $category);
            });
        });

        $query->when($filters['user'] ?? false, function($query, $user) {
            return $query->whereHas('user', function($query) use($user){
                    $query->where('username', $user);
            });
        });
        // var_dump ($query['user'] ?? false);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    // untuk menimpa 'primary key' di web routes untuk CRUD resource
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
