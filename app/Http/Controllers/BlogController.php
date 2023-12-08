<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;


class BlogController extends Controller
{
    public function index(Request $request)
    {

        $validated = request()->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10']
        ]);


        // $posts = Post::all(['id', 'title', 'published_at']);
        // $posts = Post::query()->limit(12)->offset(10)->get(['id', 'title', 'published_at']);

        // $posts = Post::query()->orderBy('published_at', 'desc')->paginate(12, ['id', 'title', 'published_at']);
        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');
        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($from_date = $validated['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($from_date));
        }

        if ($to_date = $validated['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($to_date));
        }
        if ($tag = $validated['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }

        $posts = $query
            ->latest('published_at')
            ->paginate(12, ['id', 'title', 'published_at']);
        // dd($posts);


        session()->flashInput($request->input());
        return view('blog.index', compact('posts'));
    }
    public function create()
    {
        return "страница создания постов";
    }
    public function show(Request $request, $post)
    {
        $post = cache()->remember(
            key: "posts.{$post}",
            ttl: now()->addHour(),
            callback: function () use ($post) {
                return Post::query()->findOrFail($post);
            }
        );

        Date::setLocale('ru');
        $date = Date::parse($post->published_at)->format('j F Y H:i');

        return view('blog.show', compact('post', 'date'));
    }
}
