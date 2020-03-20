<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\JoiningController;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily reminder mail for joining end date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $JoiningController = new JoiningController;
        $JoiningController->runDailyReminder();
        $JoiningController->runDailyReminderMonth();
    }
}
