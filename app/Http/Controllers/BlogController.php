<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $categories = [
            null => __('All category'),
            1 => __('first category'),
            2 => __('second category')
        ];

        $post = Post::query()->first();



        return view('blog.index', compact('posts', 'categories'));
    }
    public function show($post)
    {
        $post = (object) [
            'id' => '123',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.<b> Sed deserunt praesentium alias omnis? Iure similique perferendis libero facilis</b>, dolores in?',
        ];
        return view('blog.show', compact('post'));
    }
    public function like($post)
    {
        return 'Поставить лайк ' . $post;
    }
}
