<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call(function () {
            
            //Deleting unseen messages older than day -time diff
            DB::table('ch_messages')->whereRaw('created_at < DATE_SUB(NOW(), INTERVAL 1 DAY)')->where('seen','=',0)->update(array('body' => '<span class="obrisanap">&#187; Poruka obrisana od strane sistema</span>'));
            //Deleting seen messages older than 6 hours -time diff
            DB::table('ch_messages')->whereRaw('created_at < DATE_SUB(NOW(), INTERVAL 480 MINUTE)')->where('seen','=',1)->update(array('body' => '<span class="obrisanap">&#187; Poruka obrisana od strane sistema</span>'));

            //Deleting messages records 
            DB::table('ch_messages')->whereRaw('created_at < DATE_SUB(NOW(), INTERVAL 2 DAY)')->where('seen','=',1)->delete();

            //Deleting messages records 
            DB::table('ch_messages')->whereRaw('created_at < DATE_SUB(NOW(), INTERVAL 5 DAY)')->where('seen','=',0)->delete();
        });
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
