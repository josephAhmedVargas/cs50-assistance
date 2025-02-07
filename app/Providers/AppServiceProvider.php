<?php

namespace App\Providers;

use App\Models\Attendance;
use App\Policies\AttendancePolicy;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
   /*  protected $policies = [
        Attendance::class => AttendancePolicy::class,
    ]; */
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
