<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SincronizarUsuarios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visorcuotas:usuarios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincroniza los usuarios de otros sistemas que se crean en el visor de cuotas';

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
