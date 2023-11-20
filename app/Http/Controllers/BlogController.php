<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $post = (object) [
            'id' => 32,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '<strong>Lorem ipsum dolor sit amet consectetur</strong> adipisicing elit. Vel ad, culpa cum velit minus exercitationem perferendis! Minus odit facilis explicabo?',
            'category_id' => 1
        ];
        $posts = array_fill(0, 10, $post);
        $posts = array_filter($posts, function($post) use($search, $category_id) {
            if($search && !str_contains($post->title, $search)){
                    return false;
            }
            if($category_id && $post->category_id != $category_id){
                    return false;
            }
            return true;
        });
        return view('blog.index', compact('posts', 'search'));
    }
    public function create()
    {
        return "страница создания постов";
    }
    public function show()
    {
        $post = (object) [
            'id' => 32,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '<strong>Lorem ipsum dolor sit amet consectetur</strong> adipisicing elit. Vel ad, culpa cum velit minus exercitationem perferendis! Minus odit facilis explicabo?'
        ];
        return view('blog.show', compact('post'));
    }
}
