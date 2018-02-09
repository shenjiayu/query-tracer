<?php

namespace Fitztrev\QueryTracer\Providers;

use Illuminate\Support\ServiceProvider;
use Fitztrev\QueryTracer\Scopes\QueryTracer;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class QueryTracerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        $events->listen('eloquent.booted: *', function ($event, $data) {
            [$model] = $data;
            $model->addGlobalScope(new QueryTracer);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
