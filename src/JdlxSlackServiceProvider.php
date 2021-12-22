<?php

namespace Jdlx\Slack;

use Illuminate\Support\ServiceProvider;

class JdlxSlackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../publish/slack.php' => base_path('config/slack.php')
        ]);
    }
}
