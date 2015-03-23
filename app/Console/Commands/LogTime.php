<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon;

class LogTime extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'logtime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log the time';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line(Carbon::now());
    }

}
