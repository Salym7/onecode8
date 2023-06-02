<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = (object) [
            'id' => '123',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.<b> Sed deserunt praesentium alias omnis? Iure similique perferendis libero facilis</b>, dolores in?',
        ];
        $posts = array_fill(0, 10, $post);

        return view('user.posts.index', compact('posts'));
    }
    public function create()
    {

        return view('user.posts.create');
    }
    public function store(Request $request)
    {

        // $title = $request->input('title');
        // $content = $request->input('content');
        // dd($title, $content);
        alert(__('Saved'));
        return redirect()->route('user.posts.show', 123);
    }
    public function show($post)
    {

        $post = (object) [
            'id' => '123',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.<b> Sed deserunt praesentium alias omnis? Iure similique perferendis libero facilis</b>, dolores in?',
        ];

        return view('user.posts.show', compact('post'));
    }
    public function edit($post)
    {
        $post = (object) [
            'id' => '123',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => '
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.<b> Sed deserunt praesentium alias omnis? Iure similique perferendis libero facilis</b>, dolores in?',
        ];

        alert(__('edited'));

        return view('user.posts.edit', compact('post'));
    }
    public function update(Request $request, $post)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        // dd($title, $content);

        // return redirect()->route('user.posts.show', $post);
        return redirect()->back();
    }
    public function delete($post)
    {
        return redirect()->route('user.posts');
    }
}
