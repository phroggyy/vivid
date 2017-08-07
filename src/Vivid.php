<?php

namespace Phroggyy\Vivid;

use Illuminate\Support\Facades\Facade;
use Phroggyy\Vivid\Posts\PostManager;

class Vivid extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PostManager::class;
    }

    /**
     * Register the admin routes.
     *
     * @param string $prefix
     */
    public static function adminRoutes($prefix = 'admin/blog')
    {
        static::$app->make('router')
                    ->group([
                        'prefix' => $prefix,
                        'middleware' => array_merge(
                            (array) static::$app->make('config')->get('vivid.base_middleware'),
                            (array) static::$app->make('config')->get('vivid.admin.middleware')
                        ),
                    ], __DIR__.'/routes/admin.php');
    }

    /**
     * Register the public routes.
     *
     * @param string $prefix
     */
    public static function routes($prefix = 'blog')
    {
        static::$app->make('router')
                    ->group([
                        'prefix' => $prefix,
                        'middleware' => (array) static::$app->make('config')->get('vivid.base_middleware'),
                    ], __DIR__.'/routes/public.php');
    }
}