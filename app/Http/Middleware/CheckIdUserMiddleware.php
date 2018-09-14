<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\User;

use Closure;
use Request;
use Session;

class CheckIdUserMiddleware
{
    public function handle($Request, Closure $Next)
    {
        //get id
        $idUser = $Request->route("idUser");

        //get User
        $User = User::find($idUser);

        //check user
        if( ($User === null) or (($User->isAdmin == 0) and (Session::get("idUser") != $idUser)) )
        {
            return Reply::redirect("pageError", 403);
        }

        return $Next($Request);
    }
}
