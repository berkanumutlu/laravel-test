<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendUserSubscriptionEmail::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        /*
         * Task Scheduling
         */
        $schedule->call(function () {
            // Rapor gönderme işlemleri
            // \Illuminate\Support\Facades\Mail::to('admin@example.com')->send(new DailyReportMail());
        })->dailyAt('08:00')->timezone('Europe/Istanbul');
        // Artisan komutlarını zamanlama
        $schedule->command('emails:send')->daily();
        // Closure
        $schedule->call(function () {
            // İstediğiniz herhangi bir işlem
            \Illuminate\Support\Facades\Log::info('Bu günlük bir log mesajıdır.');
        })->daily();
        // Shell command
        $schedule->exec('node /home/forge/script.js')->daily();
        // Prevent Overlapping - Tekrar Çalıştırma
        $schedule->command('emails:send')->daily()->withoutOverlapping();
        $schedule->command('emails:send')->daily()->runInBackground();
        // Başarısız Olma Durumunda E-posta Gönderimi
        $schedule->command('emails:send')
            ->daily()
            ->emailOutputOnFailure('admin@example.com');
        // Görevlerin Durumunu İzleme
        $schedule->command('emails:send')
            ->daily()
            ->appendOutputTo('/path/to/log.txt');
        $schedule->command('emails:send')
            ->daily()
            ->onFailure(function () {
                // Hata durumunda yapılacak işlemler
                // \Illuminate\Support\Facades\Mail::to('admin@example.com')->send(new ErrorOccurredMail());
            });

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
