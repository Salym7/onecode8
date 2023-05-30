<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('token')->only('index');
    // }

    public function index()
    {
        return 'Страница списка постов';
    }
    public function like()
    {
        return 'Страница like поста';
    }
    public function show($post)
    {
        return 'Страница просмотра поста ' . $post;
    }
}
