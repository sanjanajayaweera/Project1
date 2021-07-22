<?php

/**
 * User: sahan
 * Date: 8/23/15
 * Time: 11:45 PM
 */

return [

    'driver' => env('IMAGE_DRIVER', 'imagick'),
    'upload_path' => env('IMAGE_UPLOAD_PATH', storage_path('app/public/images')),
    'access_path' => env('IMG_PATH', storage_path() . "/app/public/uploads/images"),
    'image_path' => env('IMAGE_PATH', "storage/uploads/images/"),

    /**
     * Image key to image thumbnail size mapping
     * We use these thumbnail sizes when uploading image thumbnails
     */
    1 => ['width' => 35, 'height' => 35],
    2 => ['width' => 480, 'height' => 635],
    3 => ['width' => 1920, 'height' => 700],
    4 => ['width' => 960, 'height' => 960],
    5 => ['width' => 105, 'height' => 140],
];
