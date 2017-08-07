<?php

namespace Phroggyy\Vivid\Posts;

use Illuminate\Support\Str;
use Phroggyy\Vivid\Storage;

class PostManager
{
    /**
     * @var Storage
     */
    private $storage;

    /**
     * PostManager constructor.
     *
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function newPost($title, $content)
    {
        $slug = $this->getSlugForTitle($title);

        return $this->storage->put($slug, $content);
    }

    public function updatePost($slug, $title, $content)
    {
        return $this->storage->put($slug, $content);
    }

    public function all()
    {
        return $this->storage->all();
    }

    protected function getSlugForTitle($title)
    {
        $slug = Str::lower(Str::slug($title));
        $existingPosts = $this->listPosts()->filter(function ($filename) use ($slug) {
            return Str::startsWith($filename, $slug);
        })->map(function ($filename) use ($slug) {
            return Str::replaceFirst($slug.'-', '', $filename);
        });

        if ($existingPosts->isEmpty()) {
            return $slug;
        }

        if ($existingPosts->count() === 1 && $existingPosts->first() === $slug) {
            return $slug.'-1';
        }

        return $slug.'-'.$existingPosts->sort()->last();
    }

    public function retrieve($filename)
    {
        $content = $this->storage->get($filename);

        return new Post($filename, Str::title(preg_replace('/-/', ' ', $filename)), $content);
    }
}