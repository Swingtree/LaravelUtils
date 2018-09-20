<?php

namespace Swingtree\LaravelUtils\Commands\DownloadIdentity;

use Swingtree\LaravelUtils\Commands\VerboseCommand;
use Swingtree\LaravelUtils\DownloadIdentity;

class Clear extends VerboseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'downloadidentity:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear perished download identity';

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
      $this->info('Clearing perished download identities : ....');
      $total = DownloadIdentity::count();

      DownloadIdentity::where('exp', '<', time() )->delete();
      $remaining = DownloadIdentity::count();

      $this->info( '    DONE ! '. intval($total - $remaining) . ' perished download identity cleared.');
    }
}
