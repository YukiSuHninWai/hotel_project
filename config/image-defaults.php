<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Image Paths and Settings
    |--------------------------------------------------------------------------
    |
    |
    | We set the config here so that we can keep our controllers clean.
    | Configure each image type with an image path.
    |
    */
        'HotelImage' => [
            'destinationFolder'     => '/imgs/',
            'destinationThumbnail'      => '/imgs/thumbnail/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/imgs/',
            'thumbnailPath'         => '/imgs/thumbnail/thumb-',
            'thumbHeight'           => 60,
            'thumbWidth'            => 60,
        ],
];