<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectProvider extends ServiceProvider
{
    public function register()
    {
        register_block_type( get_stylesheet_directory(). DS. 'views' . DS .'latest-project');
    }
    public static function render($block) {

        $data = get_fields() ?? [];

        $data['query'] = new \WP_Query([
            'post_type' => 'projects',
            'posts_per_page' => 3,
        ]);

        echo view(
            'latest-project.project',
            $data
        );
    }
}