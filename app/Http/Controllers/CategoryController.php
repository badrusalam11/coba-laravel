<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Categories',
            'active' => 'Categories',
            'categories'=> Category::all()
        ]);
    }

    public function show(Category $category)
    {
        // echo"<pre>";
        // var_dump(Post::where('category_id', $category['id'])->get());
        // echo"</pre>";
        // die;
        return view('posts', [
            'title' => 'Category : '. $category->name,
            'active' => 'Categories',
            'posts' => Post::where('category_id', $category['id'])->get(),
            'category'=>$category
        ]);
    }
}
