<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Kirim semua kategori ke layout app
        View::composer('layouts.sidebar', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }

    public function register()
    {
        //
    }
}
