<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\User;

use Closure;
use Request;
use Session;

class CheckAdminMiddleware
{
    public function handle($Request, Closure $Next)
    {
        //get User
        $User = User::find(Session::get("idUser"));

        //check user
        if($User->isAdmin == 0)
        {
            return Reply::redirect("error", 403);
        }

        return $Next($Request);
    }
}
