<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GeradorAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:generate {userId=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Torna um usuário admin.';

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

        $user->roles()->attach(1);

        foreach($user->roles as $role) {
            if ($role->tipo == 1) {
                return $this->info('Admin gerado com sucesso!');
            }
        }
        
        return $this->error('Algo deu errado');
    }
}
