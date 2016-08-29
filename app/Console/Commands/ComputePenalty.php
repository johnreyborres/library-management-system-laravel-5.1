<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App/User;
use App/Book;

class ComputePenalty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penalty:compute';

    /**
     * The console command description.
     *  
     * @var string
     */
    protected $description = 'Computes the penalty for unreturned borrowed books after the set expiry date.';

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
        //get user_books
        //check the date difference (expiry_date - today)
        //if greater than 0, compute and update penalty_fee
    }
}
