<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        // $validated = $request->validated();

        // $validated = $request->validate([
        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:10000'],
        // ]);

        // $validated = validator($request->all(), [
        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:10000'],
        // ])->validate();
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        // if (true) {
        //     throw ValidationException::withMessages([
        //         'account' => __('dont money'),
        //     ]);
        // }

        $post = Post::query()->firstOrCreate([
            'user_id' => User::query()->value('id'),
            'title' => $validated['title'],
        ], [
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at'] ?? null),
            'published' => $validated['published'] ?? false,
        ]);


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



        return view('user.posts.edit', compact('post'));
    }
    public function update(Request $request, $post)
    {
        alert(__('edited'));
        $title = $request->input('title');
        $content = $request->input('content');
        // dd($title, $content);

        // return redirect()->route('user.posts.show', $post);
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        // if (true) {
        //     throw ValidationException::withMessages([
        //         'account' => __('dont money'),
        //     ]);
        // }
        dd($validated);
        return redirect()->back();
    }
    public function delete($post)
    {
        return redirect()->route('user.posts');
    }
}
