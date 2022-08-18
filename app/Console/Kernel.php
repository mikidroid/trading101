<?php

namespace App\Console;
use App\Models\User;
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
         $schedule->command('queue:work')->everyFiveMinutes()->withoutOverlapping();
         */
        
         //development testing
         $schedule->command('LotteryCron')->dailyAt('13:00');
         $schedule->command('InvestCron')->everySixHours();
         
         //Queuework
         if (!strstr(shell_exec('ps xf'), 'php artisan queue:work'))
         {
            $schedule->command('queue:work --timeout=60 --tries=1')->withoutOverlapping();
         }
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
