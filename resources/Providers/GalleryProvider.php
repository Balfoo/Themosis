<?php

namespace Theme\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Extended\ACF\Fields\Gallery;
use Extended\ACF\Location;
use Themosis\Support\Facades\Action;

class GalleryProvider extends ServiceProvider
{
    /**
     * Theme Assets
     *
     * Here we define the loaded assets from our previously defined
     * "dist" directory. Assets sources are located under the root "assets"
     * directory and are then compiled, thanks to Laravel Mix, to the "dist"
     * folder.
     *
     * @see https://laravel-mix.com/
     */
    public function register()
    {
//        Action::add('acf/init', [$this, 'registerFields']);
        Action::add('wp', [$this, 'setViewVars']);
    }

    public function setViewVars() {
        View::composer('pages.front', function ($view) {
            $image_size = config('gallery.images.size');
            $gallery_items = get_field('gallery_image');

            $view->with([
                'image_size', $image_size,
                'gallery_items', $gallery_items
            ]);
        });
    }
}