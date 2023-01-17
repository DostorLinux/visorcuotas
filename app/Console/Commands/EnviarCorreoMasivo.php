<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EnviarCorreoMasivo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visorcuotas:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía correos electrónicos cuando se agreguen a los usuarios';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
