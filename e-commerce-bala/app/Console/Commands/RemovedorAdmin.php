<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RemovedorAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:remove {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remover um admin.';

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
     * @return int
     */
    public function handle()
    {
        $userId = $this->argument('userId');
        $user = User::find($userId);

        $user->roles()->detach(1);

        $this->info('Admin removido.');
    }
}
