<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        // dd(request(['search']));
        $post = Post::latest();
        $title ='';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '.$category->name;
        }
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            // dd($user);
            $title = ' By '.$user->name;
        }
        
        return view('posts', [
            'title' => 'All Posts' . $title,
            'active' => 'Posts',
            // 'posts' => Post::all()
            'posts' => $post->filter(request(['search', 'category','user']))->paginate(7)->withQueryString()
        ]);
    }
    public function show(Post $post)
    {
        
        return view('post', [
            'title' => 'Halaman Post',
            'active' => 'Posts',
            'post' => $post
        ]);
    }
    public function showAuthor(User $user)
    {
        // echo"<pre>";
        // var_dump($user->post);
        // echo"</pre>";
        // die;
        return view('posts',[
            'title' => 'Author : '.$user->name,
            'active' => 'Posts',
            'posts' => $user->post->load('category','user')
        ]);
        
    }
}
