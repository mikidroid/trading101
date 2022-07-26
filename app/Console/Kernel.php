<?php

namespace App\Console;
use App\Models\User;
use App\Console\Commands\InvestCron;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         /* production
         $schedule->command('LotteryCron')->weekly()->fridays()->at('6:00');
         $schedule->command('InvestCron')->dailyAt('12:00'); 
         $schedule->command('QueueRestart')->dailyAt('24:00');
         $schedule->command('QueueRetry')->everyHour();
         */
        
         //development testing
         $schedule->command('LotteryCron')->everyMinute();
         $schedule->command('InvestCron')->everyMinute();
         
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
