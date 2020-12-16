<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;

class Jobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $jobs = [
            [
                'id' => 1,
                'title' => 'Title- 1' . ' ' . (new \DateTime())->format('m/d/Y g:i A'),
                'success' => true,
                'time_taken' => 100, //s
            ],
            [
                'id' => 2,
                'title' => 'Title- 2' . ' ' . (new \DateTime())->format('m/d/Y g:i A'),
                'success' => true,
                'time_taken' => 50, //s

            ],
            [
                'id' => 3,
                'title' => 'Title- 3' . ' ' . (new \DateTime())->format('m/d/Y g:i A'),
                'success' => false,
                'time_taken' => 200, //s

            ],
            [
                'id' => 4,
                'title' => 'Title- 4' . ' ' . (new \DateTime())->format('m/d/Y g:i A'),
                'success' => true,
                'time_taken' => 150, //s
            ],
            [
                'id' => 5,
                'title' => 'Title- 5' . ' ' . (new \DateTime())->format('m/d/Y g:i A'),
                'success' => true,
                'time_taken' => 300, //s
            ],
        ];
        foreach($jobs as $job) {
            if($job['success']) {
                Log::channel('loggly')->info('Job Success', $job);
            } else {
                Log::channel('loggly')->error('Job Failure', $job);
            } 
        }
    }
}
