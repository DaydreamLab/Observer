<?php

namespace DaydreamLab\Observer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'observer:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install DaydreamLab Observer component';


    protected $seeder_namespace = 'DaydreamLab\\Observer\\Database\\Seeds\\';


    protected $constants = [
        //'log',
    ];


    protected $seeders = [
        //'AssetsTableSeeder',
    ];


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
        $this->deleteConstants();
    }


    public function deleteConstants()
    {
        $constants_path     = 'config/constants/';
        foreach ($this->constants as $constant) {
            File::delete($constants_path . $constant . '.php');
            File::delete(config_path() . '/'. $constant . '.php');
        }
    }
}
