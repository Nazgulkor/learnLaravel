<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
    {
        $post = (object) [
            'id' => 32,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '<strong>Lorem ipsum dolor sit amet consectetur</strong> adipisicing elit. Vel ad, culpa cum velit minus exercitationem perferendis! Minus odit facilis explicabo?'
        ];
        $posts = array_fill(0, 10, $post);
        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function show()
    {
        $post = (object) [
            'id' => 32,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '<strong>Lorem ipsum dolor sit amet consectetur</strong> adipisicing elit. Vel ad, culpa cum velit minus exercitationem perferendis! Minus odit facilis explicabo?'
        ];
        return view('user.posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        // $validated = validator(
        //     $request->all(),
        //     [
        //         'title' => ['required', 'string', 'max:100'],
        //         'content' => ['required', 'string'],
        //     ]
        // )->validate();


        // $validated = $request->validate(
        //     [
        //         'title' => ['required', 'string', 'max:100'],
        //         'content' => ['required', 'string'],
        //     ]
        // );

        //функция хелпер самописная
        $validated = validate(
            $request->all(),
            [
                'title' => ['required', 'string', 'max:100'],
                'content' => ['required', 'string'],
                'published_at' => ['nullable','string', 'date'],
                'published' => ['nullable','boolean'],
            ]
        );

        $post = Post::create([
            'user_id' => User::query()->value('id'),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at']) ?? null,
            'published' => $validated['published'] ?? false,
        ]);
        dd($post);
        session(['alert' => __('Пост создан')]);
        return redirect()->route('posts.show', 123);
    }


    public function edit()
    {
        $post = (object) [
            'id' => 32,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '<strong>Lorem ipsum dolor sit amet consectetur</strong> adipisicing elit. Vel ad, culpa cum velit minus exercitationem perferendis! Minus odit facilis explicabo?'
        ];
        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        //функция хелпер самописная
        $validated = validate(
            $request->all(),
            [
                'title' => ['required', 'string', 'max:100'],
                'content' => ['required', 'string'],
            ]
        );


        return redirect()->back();
    }
}
