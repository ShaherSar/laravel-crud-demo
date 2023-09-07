<?php

namespace App\Providers;

use App\Services\EmailService\EmailService;
use App\Services\EmailService\SmtpEmailService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{
    /**
     * Register any application services.
     */
    public function register(): void{
        $this->app->bind(EmailService::class, function(){
            return new SmtpEmailService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
