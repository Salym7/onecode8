<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use function PHPUnit\Framework\callback;

class BlogController extends Controller
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

        if (false) {
            // $posts = Post::query()->latest('published_at')->paginate($limit);
            // $posts = Post::query()
            //     ->where('title', 'like', "%{$search}%")
            //     ->paginate($limit);

            // $posts = Post::query()
            //     // ->where('published_at', null)
            //     ->whereNull('published_at')
            //     // ->whereNotNull('published_at')
            //     ->paginate($limit);

            // $posts = Post::query()
            //     ->whereDate('published_at', new Carbon('2023-06-01'))
            //     // ->whereYear('published_at', 2023)
            //     // ->whereMonth('published_at', 6)
            //     // ->whereDay('published_at', 1)
            //     ->paginate($limit);
            // $posts = Post::query()
            //     ->whereBetween('published_at', [
            //         new Carbon('2022-12-02'),
            //         new Carbon('2023-05-01')
            //     ])
            //     // ->whereMonth('published_at', 6)
            //     // ->whereDay('published_at', 1)
            //     ->paginate($limit);

            // $posts = Post::query()
            //     ->where('published', true)
            //     ->whereNotNull('published_at')
            //     ->orWhere('id', 1255)
            //     ->paginate($limit);
            // $posts = Post::query()
            //     ->where(function (Builder $query) {
            //         $query->where('id', 10)
            //             ->orWhereNotNull('published_at');
            //     })
            //     ->orWhere('published', true)
            //      ->paginate(12);

            // $fromDate = null;
            // $toDate = new Carbon('2023-05-01');

            // N1
            // $posts = Post::query()
            //     ->when(
            //         $fromDate,
            //         function (Builder $query, Carbon $fromDate) {
            //             $query->where('published_at', '>=', $fromDate);
            //         },
            //         function (Builder $query) {
            //             $query->where('published_at', '>=', now()->startOfYear());
            //         }
            //     )->paginate(12);
            // N2
            // $query = Post::query();

            // if ($fromDate) $query->where('published_at', '>=', $fromDate);
            // else $query->where('published_at', '>=', now()->startOfYear());
            // N3
            // $fromDate
            //     ? $query->where('published_at', '>=', $fromDate)
            //     : $query->where('published_at', '>=', now()->startOfYear());

            // $posts = $query->paginate(12);
        };
        return view('blog.index', compact('posts'));
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

        return view('blog.show', compact('post'));
    }
    public function like($post)
    {
        return 'Поставить лайк ' . $post;
    }
}
