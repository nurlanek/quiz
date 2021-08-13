<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command

{

    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from jasonplaceholder';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        dd($response);

    }
}
