<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $rules = [
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:1000'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return Inertia::location('/posts');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Admin/Post/Show', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        // 投稿の更新
    }

    public function destroy($id)
    {
        // 投稿の削除
    }
}
