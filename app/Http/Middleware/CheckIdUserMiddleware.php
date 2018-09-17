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
        $User = User::find(Session::get("idUser"));
        $UserAsk = User::find($idUser);

        if($User === null)
        {
            return Reply::redirect("error", 403);
        }

        if($UserAsk === null)
        {
            return Reply::redirect("error", 404);
        }

        //check user
        if( ($User->isAdmin == 0) and ($User->id != $idUser) )
        {
            return Reply::redirect("error", 403);
        }

        return $Next($Request);
    }
}
