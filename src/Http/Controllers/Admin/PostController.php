<?php

namespace Phroggyy\Vivid\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Phroggyy\Vivid\Posts\PostManager;

class PostController extends Controller
{
    public function edit($post, PostManager $posts)
    {
        $post = $posts->retrieve($post);
        return view('vivid::admin.posts.edit', compact('post'));
    }

    public function store($post, Request $request, PostManager $posts)
    {
        $posts->newPost($request->title, $request->input('content'));
    }

    public function update($post, Request $request, PostManager $posts, Redirector $redirector)
    {
        $posts->updatePost($post, $request->title, $request->input('content'));

        return $redirector->route('vivid::admin.posts.edit', $post);
    }
}