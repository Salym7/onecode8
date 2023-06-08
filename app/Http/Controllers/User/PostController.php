<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\Post;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $validated =  $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
        ]);
        $page   = $validated['page'] ?? 1;
        $limit   = $validated['limit'] ?? 12;
        $offset   = $limit * ($page - 1);

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }
        if ($fromDate = $validated['from_date'] ?? null) {

            $query->where('published_at', '>=', new Carbon($fromDate));
        }
        if ($toDate = $validated['to_date'] ?? null) {

            $query->where('published_at', '<=', new Carbon($toDate));
        }
        if ($tag = $validated['tag'] ?? null) {

            $query->whereJsonContains('tags', $tag);
        }
        $posts = $query->latest('published_at')
            ->paginate(12);

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
        ]);

        // if (true) {
        //     throw ValidationException::withMessages([
        //         'account' => __('dont money'),
        //     ]);
        // }
        dd($validated);

        alert(__('Saved'));
        return redirect()->route('user.posts.show', 123);
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
