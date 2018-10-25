# Vivid for Laravel

A drop-in flat-file blog system for Laravel

## Installation

### Install with composer
`composer require phroggyy/vivid`

### Add to your project

In the `boot()` method of a service provider, such as your `AppServiceProvider`, add

```
use Vivid;

...

public function boot()
{

    ...

    Vivid::adminRoutes();
    Vivid::routes();
}
```

## Usage

Once installed you will have access to the following routes by default:


### Public routes


### `/blog` 


A list of your blog posts

#### `/blog/{post}`

A single blog post


#### `/blog/{tags}`

A list of tags


#### `/blog/{tag}`

A single tag


### Admin routes

#### `/admin/blog`

Admin overview


#### `admin/blog/posts/new`

Create new post


#### `admin/blog/posts/{post}`

Edit post


## Configuration

### Config file

To publish the package config file to allow customisation of the configuration use the following terminal command:

`php artisan vendor:publish`

Then select the `Provider: Phroggyy\Vivid\VividServiceProvider` option from the list of providers.

This will copy the default config file `vivid.php` into your `config/` directory where you can edit the values.


### Blog route uri prefixs

By default the public route uris are prefixed with `/blog` and the admin routes with `/admin/blog`. You can change these by passing an alternative uri string as the to the first parameters of `Vivid::adminRoutes()` and `Vivid::routes()` in your service provider.


#### Example:

```

use Vivid;

...

public function boot()
{

    ...

    Vivid::adminRoutes('admin/rants');
    Vivid::routes('rants');
}
```
