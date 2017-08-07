<?php

namespace Phroggyy\Vivid\Http\Controllers;

use Phroggyy\Vivid\Posts\PostManager;

class PostController
{
    public function index(PostManager $posts)
    {
        return view('vivid::posts.index', ['posts' => $posts->all()]);
    }

    public function show($post, PostManager $posts)
    {
        return view('vivid::posts.show', ['post' => $posts->retrieve($post)]);
    }
}