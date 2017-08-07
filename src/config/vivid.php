<?php

return [
    'admin' => [
        /*
        |---------------------------------------------------------------------
        | Template
        |---------------------------------------------------------------------
        |
        | The storage disk allows you to specify which storage disk should be
        | used by Vivid for storing your blog posts. This must be the name
        | of a registered Laravel filesystem in your filesystems config.
        |
        */
        'template' => 'layouts.app',
        'section' => 'content',
        'root_classes' => 'container',
    ],
    'storage' => [
        /*
        |---------------------------------------------------------------------
        | Storage Disk
        |---------------------------------------------------------------------
        |
        | The storage disk allows you to specify which storage disk should be
        | used by Vivid for storing your blog posts. This must be the name
        | of a registered Laravel filesystem in your filesystems config.
        |
        */
        'disk' => 'local',

        /*
        |---------------------------------------------------------------------
        | Storage Prefix
        |---------------------------------------------------------------------
        |
        | The storage prefix allows you to set a prefix to the storage path.
        | This is especially useful if you use a shared disk and want to
        | store all the blog posts in a certain directory on the disk.
        |
        */
        'prefix' => 'blog'
    ]
];