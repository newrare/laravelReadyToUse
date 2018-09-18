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

        //check User ask
        $UserAsk = User::find($idUser);

        if($UserAsk === null)
        {
            return Reply::redirect("error", 404);
        }

        //check right
        $User = User::find(Session::get("idUser"));

        if( ($User->isAdmin == 0) and ($User->id != $idUser) )
        {
            return Reply::redirect("error", 403);
        }

        return $Next($Request);
    }
}
