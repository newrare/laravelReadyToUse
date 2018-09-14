<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Classes\Record;
use App\Http\Models\User;

class SetUserAdmin extends Command
{
    protected $signature    = "action:setUser";
    protected $description  = "Use this command for set an user login to admin";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $login  = $this->ask("Who login set to admin?");
        $User   = User::where("login", $login)->first();

        if ($User !== null)
        {
            $User->isAdmin = 1;

            Record::save($User, "Set user to admin by command line.");

            $this->info("The user admin is updated.");
        }
        else
        {
            $this->warn("This user does not exist.");
        }
    }
}
