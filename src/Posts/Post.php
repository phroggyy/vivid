<?php

namespace Phroggyy\Vivid\Posts;

use Illuminate\Support\Str;
use Parsedown;

class Post
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $filename;

    /**
     * Post constructor.
     *
     * @param $filename
     * @param $title
     * @param $content
     */
    public function __construct($filename, $title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->filename = $filename;
    }

    public function render()
    {
        return (new Parsedown)->parse($this->content);
    }

    public function excerpt($words = 120)
    {
        return Str::words(strip_tags((new Parsedown)->text($this->content)), $words);
    }
}