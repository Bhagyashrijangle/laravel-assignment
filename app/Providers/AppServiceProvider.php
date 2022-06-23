<?php

namespace App\Providers;
use Queue;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\Events\JobFailed;
use App\Models\LogMessage;
use App\Notifications\Slack;
use Illuminate\Support\Facades\Notification;
use NicolasMahe\SlackOutput\Facade\SlackOutput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::failing(function (JobFailed $job) {
        SlackOutput::jobFailed($job);
  });
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
