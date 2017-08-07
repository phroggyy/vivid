<?php

namespace Phroggyy\Vivid;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Storage
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * @var FilesystemManager
     */
    private $manager;

    /**
     * @var Repository
     */
    private $config;

    /**
     * @var string
     */
    protected $storagePrefix;

    /**
     * Storage constructor.
     *
     * @param FilesystemManager $manager
     * @param Config            $config
     */
    public function __construct(FilesystemManager $manager, Config $config)
    {
        $this->manager = $manager;
        $this->config = $config;
        $this->on($config->get('vivid.storage.disk'));
        $this->storagePrefix = $config->get('vivid.storage.prefix');
    }

    /**
     * @param  string  $path
     * @return string
     */
    public function get($path)
    {
        return $this->filesystem->get($this->getRealPath($path));
    }

    /**
     * @param  string  $path
     * @param  string|resource  $contents
     * @return bool
     */
    public function put($path, $contents)
    {
        return $this->filesystem->put($this->getRealPath($path), $contents);
    }

    /**
     * Set the disk to use for storage.
     *
     * @param  string  $disk
     * @return static
     */
    public function on($disk)
    {
        $this->filesystem = $this->manager->disk($disk);

        return $this;
    }

    /**
     * Retrieve all files.
     *
     * @return Collection
     */
    public function all()
    {
        return collect($this->filesystem->allFiles($this->storagePrefix))
            ->map(function ($filename) {
                return $this->stripPrefix($filename);
            })
            ->map(function ($filename) {
                return $this->stripMarkdownExtension($filename);
            });
    }

    /**
     * Proxy calls to the filesystem.
     *
     * @param  $name
     * @param  $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->filesystem->{$name}(...$arguments);
    }

    /**
     * Retrieve the actual path to the file.
     *
     * @param  string  $path
     * @return string
     */
    protected function getRealPath($path = null)
    {
        $path = Str::endsWith($path, '.md') ? $path : $path.'.md';
        return $this->storagePrefix ?
            $this->storagePrefix.'/'.ltrim($path, '/') :
            $path;
    }

    private function stripMarkdownExtension($filename)
    {
        return preg_replace('/\.md$/', '', $filename);
    }

    private function stripPrefix($filename)
    {
        return $this->storagePrefix ? Str::replaceFirst($this->storagePrefix.'/', '', $filename) : $filename;
    }
}