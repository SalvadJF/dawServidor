<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {UserEmail}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make A User Admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user_email = $this->argument('UserEmail');
        User::where('email', $user_email)
        ->update([
            'role' => 'admin'
        ]);
        echo "Finished";
    }
}
