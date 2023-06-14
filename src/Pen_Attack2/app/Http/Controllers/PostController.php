<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Admin/Post/Index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        // 投稿の保存ロジックを実装してください
    }

    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Admin/Post/Show', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        // 投稿の更新ロジックを実装してください
    }

    public function destroy($id)
    {
        // 投稿の削除ロジックを実装してください
    }
}