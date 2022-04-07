<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use Sluggable;
    use HasFactory;
    protected $guarded = ['id'];

    public function post()
    {
        return $this->hasMany(Post::class);
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
                'source' => 'name'
            ]
        ];
    }
}
