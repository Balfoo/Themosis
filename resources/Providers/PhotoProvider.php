<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;

class PhotoProvider extends ServiceProvider
{
    public function register()
    {
        register_block_type( get_stylesheet_directory(). DS. 'views' . DS .'gallery');
    }
    public static function render($block) {
        $data = get_fields();
        $data['block'] = $block;
        echo view('gallery.photo', $data);
    }
}