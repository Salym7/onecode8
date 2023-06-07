<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;



class TestController extends Controller
{
    // public function index()
    // {
    //     return view('register.index');
    // }
    public function __construct()
    {
        // $this->middleware('throttle:10');
    }
    public function __invoke(Request $request)
    {
        for ($i = 0; $i < 99; $i++) {
            Post::query()->create(
                [
                    'user_id' => User::query()->value('id'),
                    'title' => fake()->sentence(),
                    'content' => fake()->paragraph(),
                    'published' => true,
                    'published_at' => fake()->dateTimeBetween(now()->subYear(), now()),
                ]
            );
        }
    }
}
