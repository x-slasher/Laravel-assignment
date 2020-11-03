<?php

namespace App\Console;

use App\Console\Commands\FindAnswer;
use App\Jobs\SendEmail;
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
        FindAnswer::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    	$schedule->command('find:answer')->daily();  //run this schedule at 12 am

	    $schedule->call(function (){
		    dispatch(new SendEmail());
	    })->cron('0 */48 * * *')->at('8:00');  //run corn after 48 hours apart at 8 am
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
