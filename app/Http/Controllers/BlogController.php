<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // $data = $request->all();
        $search = $request->input('search');
        $category_id = $request->input('category_id');



        $post = (object) [
            'id' => '123',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.<b> Sed deserunt praesentium alias omnis? Iure similique perferendis libero facilis</b>, dolores in?',
            'category_id' => 1,
        ];
        $posts = array_fill(0, 10, $post);

        $posts = array_filter($posts, function ($post) use ($search, $category_id) {
            if ($search && !str_contains(strtolower($post->title), strtolower($search))) {
                return false;
            }
            if ($category_id &&  $post->category_id != $category_id) {
                return false;
            }

            return true;
        });
        $categories = [
            null => __('All category'),
            1 => __('first category'),
            2 => __('second category')
        ];

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
