<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\Blog;

use Closure;
use Request;

class CheckIdBlogMiddleware
{
    public function handle($Request, Closure $Next)
    {
        //get Blog
        $Blog = Blog::find($Request->route("idBlog"));

        if($Blog === null)
        {
            return Reply::redirect("/blog", "404");
        }

        return $Next($Request);
    }
}
