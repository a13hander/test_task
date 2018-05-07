<?php

namespace App\Console\Commands;

use App\Services\ImportUsedCarsService;
use Illuminate\Console\Command;

class ImportUsedCarsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:used-cars {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import used cars';

    private $service;

    /**
     * Create a new command instance.
     *
     * @param ImportUsedCarsService $service
     */
    public function __construct(ImportUsedCarsService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->argument('file');

        try {
            $result = $this->service->loadInDB($file);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return;
        }

        if(!$result) {
            $this->error('Can`t load xml file!');
        }
    }
}
