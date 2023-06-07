<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\callback;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $categories = [
            null => __('All category'),
            1 => __('first category'),
            2 => __('second category')
        ];

        $validated =  $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $page   = $validated['page'] ?? 1;
        $limit   = $validated['limit'] ?? 12;
        $offset   = $limit * ($page - 1);

        $posts = Post::query()->latest('published_at')->paginate($limit);

        return view('blog.index', compact('posts', 'categories'));
    }
    public function show(Request $request, $post)
    {

        // $post = Post::query()->oldest('id')
        //     ->where('user_id', 1001)
        //     ->firstOrFail(['id', 'title']);

        // $post = Post::query()->find($post);

        $post = cache()->remember(
            key: "posts.{$post}",
            ttl: now()->addHour(),
            callback: function () use ($post) {
                return Post::query()->findOrFail($post);
            }
        );

        return view('blog.show', compact('post'));
    }
    public function like($post)
    {
        return 'Поставить лайк ' . $post;
    }
}
