<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Twilio\Rest\Client;

use \App\Models\Mensaje;

class EnviarMensajesSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visorcuotas:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía mensajes SMS programados.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mensajes = Mensaje::where(['enviado' => false])->get();

        foreach($mensajes as $mensaje) {
            $account_sid = getenv('TWILIO_SID');
            $account_token = getenv('TWILIO_TOKEN');
            $account_number = getenv('TWILIO_FROM');

            try {
                $client = new Client($account_sid, $account_token);
                $client->messages->create($mensaje->receptor, [
                    'from' => $account_number,
                    'body' => $mensaje->contenido,
                ]);

                $mensaje->enviado = true;
                $mensaje->save();
            } catch (Exception $e) {
                $mensaje->error = $e->getMessage();
                $mensaje->save();
            }
        }

        return Command::SUCCESS;
    }
}
