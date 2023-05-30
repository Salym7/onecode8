<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'Страница списка постов';
    }
    public function create()
    {
        return 'Страница создания поста';
    }
    public function store()
    {
        return 'Запрос создания поста';
    }
    public function show($post)
    {
        return 'Страница просмотра поста ' . $post;
    }
    public function edit()
    {
        return 'Страница изменения поста';
    }
    public function update()
    {
        return 'Страница изменения поста';
    }
    public function delete()
    {
        return 'Страница удаление постов';
    }
}
