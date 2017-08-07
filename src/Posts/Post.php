<?php

namespace Phroggyy\Vivid\Posts;

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
}