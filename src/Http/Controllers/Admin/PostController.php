<?php

namespace Phroggyy\Vivid\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Phroggyy\Vivid\Posts\PostManager;

class PostController extends Controller
{
    public function create()
    {
        return view('vivid::admin.posts.edit', [
            'action' => route('vivid::admin.posts.store')
        ]);
    }

    public function edit($post, PostManager $posts)
    {
        $post = $posts->retrieve($post);
        return view('vivid::admin.posts.edit', [
            'post' => $post,
            'action' => route('vivid::admin.posts.update', $post->filename),
            'method' => 'PUT'
        ]);
    }

    public function store(Request $request, PostManager $posts, Redirector $redirector)
    {
        $posts->newPost($request->title, $request->input('content'));

        return $redirector->route('vivid::admin.overview');
    }

    public function update($post, Request $request, PostManager $posts, Redirector $redirector)
    {
        $posts->updatePost($post, $request->title, $request->input('content'));

        return $redirector->route('vivid::admin.posts.edit', $post);
    }
}