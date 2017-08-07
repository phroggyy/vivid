<?php

namespace Phroggyy\Vivid\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Phroggyy\Vivid\Posts\PostManager;
use Phroggyy\Vivid\Storage;

class OverviewController extends Controller
{
    /**
     * @var PostManager
     */
    private $posts;

    /**
     * OverviewController constructor.
     *
     * @param PostManager $posts
     */
    public function __construct(PostManager $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        $posts = $this->posts->all();
//        dd($posts);
        return view('vivid::admin.overview', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $this->storage->put($request->input(title), $request->input('content'));
    }
}