<?php

namespace App\Providers;

use App\Nova\Metrics\ActiveJobs;
use App\Nova\Metrics\ActiveUsers;
use App\Nova\Metrics\Agency;
use App\Nova\Metrics\Employer;
use App\Nova\Metrics\NewJobs;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\TotalJobs;
use App\Nova\Metrics\TotalUsers;
use App\Nova\Metrics\Worker;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Worker,
            new Employer,
            new Agency,
//            new Help,
            new ActiveUsers,
            (new TotalUsers)->width('2/3'),
            (new NewUsers)->width('2/3'),
            new ActiveJobs,
            (new TotalJobs),
            (new NewJobs)->width('2/3'),


        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
