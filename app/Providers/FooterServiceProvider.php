<?php

namespace App\Providers;

use App\View\Composers\FooterComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FooterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('partials.footer',FooterComposer::class);
    }
}
