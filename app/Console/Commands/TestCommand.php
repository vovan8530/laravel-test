<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'test';

    protected $description = 'test action';


    public function handle()
    {

        $result = (new UserController)->restore();

        $this->info("The result is: $result");

        return Command::SUCCESS;
    }
}

