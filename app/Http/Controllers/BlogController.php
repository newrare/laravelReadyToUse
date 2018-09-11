<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Classes\Record;
use App\Http\Classes\Reply;
use App\Http\Classes\Tools;
use App\Http\Models\Blog;
use App\Http\Models\User;

use Input;
use Session;
use Validator;

class BlogController extends Controller
{
    //GET /blog
    public function index()
    {
        //get admin
        $isAdmin = 0;

        if(Session::has("idUser"))
        {
            $User = User::find(Session::get("idUser"));

            $isAdmin = $User->isAdmin;
        }

        //get Blog list
        if($isAdmin == 1)
        {
            $ListBlog = Blog::orderBy("id", "desc")->get();
        }
        else
        {
            $ListBlog = Blog::where("lang", Session::get("lang"))->orderBy("id", "desc")->get();
        }

        //parse Blog list
        foreach ($ListBlog as $Blog)
        {
            //get user login
            $Blog->user = User::find($Blog->idUser)->login;

            //check image
            if(Tools::testUrl($Blog->urlImage) !== true)
            {
                $Blog->urlImage = null;
            }

            //check video
            $video_url = @file_get_contents("https://www.youtube.com/oembed?format=json&url=" . $Blog->urlVideo);

            if(!$video_url)
            {
                $Blog->urlVideo = null;
            }
            else
            {
                $Blog->urlVideo = str_replace("www.youtube.com/watch?v=", "www.youtube.com/embed/", $Blog->urlVideo);
            }
        }

        //return result
        $reply = array(
            "isAdmin"   => $isAdmin,
            "ListBlog"  => $ListBlog
        );

        return Reply::make("blog", 200, $reply);
    }

    //POST /blog
    public function store()
    {
        //create rules for check input
        $rules = array(
            "lang"          => "required|in:en,fr",
            "message"       => "required",
            "messageTitle"  => "required"
        );

        //check url image
        $imageError = null;

        if(Input::get("urlImage") !== null)
        {
            //test url image
            if(Tools::testUrl(Input::get("urlImage")) !== true)
            {
                $imageError = trans("validation.badUrl");
            }
            else
            {
                //file is real image ?
                $tabImageInfo = getimagesize(Input::get("urlImage"));

                if(!is_array($tabImageInfo))
                {
                    $imageError = trans("validation.noImage");
                }
            }
        }

        //check url video
        $videoError = null;

        if(Input::get("urlVideo") !== null)
        {
            $video_url = @file_get_contents("https://www.youtube.com/oembed?format=json&url=" . Input::get("urlVideo"));

            if(!$video_url)
            {
                $videoError = trans("validation.badUrl");
            }
        }

        //test rules
        $Validation = Validator::make(Input::all(), $rules);

        if( ($Validation->fails()) || ($imageError !== null) || ($videoError !== null) )
        {
            if($imageError !== null)
            {
                $Validation->errors()->add("urlImage", $imageError);
            }

            if($videoError !== null)
            {
                $Validation->errors()->add("urlVideo", $videoError);
            }

            return Reply::back(400, $Validation);
        }

        //save new blog
        $Blog = new Blog;

        $Blog->idUser       = Session::get("idUser");
        $Blog->lang         = Input::get("lang");
        $Blog->message      = Input::get("message");
        $Blog->messageDate  = date("Y-m-d");
        $Blog->messageTitle = Input::get("messageTitle");
        $Blog->urlImage     = Input::get("urlImage");
        $Blog->urlVideo     = Input::get("urlVideo");

        //save it
        Record::save($Blog, "Save a new blog.");

        //return collection
        return Reply::redirect("/blog", 202);
    }

    //GET /blog/{idBlog}
    //or
    //GET /blog/create
    public function show($idBlog)
    {
        //check action create in first
        if($idBlog == "create")
        {
            $reply = array(
                "formUrl"       => "/blog",
                "formMethod"    => "POST",
                "lang"          => Session::get("lang"),
                "message"       => "",
                "messageTitle"  => "",
                "urlImage"      => "",
                "urlVideo"      => ""
            );

            return Reply::make("blogCreate", 200, $reply);
        }

        //get Blog
        $Blog = Blog::find($idBlog);

        //check Blog
        if($Blog === null)
        {
            return Reply::make("pageError", 404);
        }

        $reply = array(
            "formUrl"       => "/blog/" . $idBlog,
            "formMethod"    => "PUT",
            "lang"          => $Blog->lang,
            "message"       => $Blog->message,
            "messageTitle"  => $Blog->messageTitle,
            "urlImage"      => $Blog->urlImage,
            "urlVideo"      => $Blog->urlVideo
        );

        return Reply::make("blogCreate", 200, $reply);
    }

    //PUT /blog/{idBlog}
    public function update($idBlog)
    {
        //get Blog
        $Blog = Blog::find($idBlog);

        //check Blog
        if($Blog === null)
        {
            return Reply::make("pageError", 404);
        }

        //create rules
        $rules = array(
            "lang"          => "required|in:en,fr",
            "message"       => "required",
            "messageTitle"  => "required"
        );

        //urlImage
        $imageError = null;

        if(Input::get("urlImage") !== null)
        {
            //test url image
            if(Tools::testUrl(Input::get("urlImage")) !== true)
            {
                $imageError = trans("validation.badUrl");
            }
            else
            {
                //file is real image ?
                $tabImageInfo = getimagesize(Input::get("urlImage"));

                if(!is_array($tabImageInfo))
                {
                    $imageError = trans("validation.noImage");
                }

                $Blog->urlImage = Input::get("urlImage");
            }
         }
         else
         {
            $Blog->urlImage = null;
         }

         //check url video
         $videoError = null;

         if(Input::get("urlVideo") !== null)
         {
            $video_url = @file_get_contents("https://www.youtube.com/oembed?format=json&url=" . Input::get("urlVideo"));

            if(!$video_url)
            {
                $videoError = trans("validation.badUrl");
            }

            $Blog->urlVideo = Input::get("urlVideo");
         }
         else
         {
            $Blog->urlVideo = null;
         }

         //test rules
         $Validation = Validator::make(Input::all(), $rules);

         if( ($Validation->fails()) || ($imageError !== null) || ($videoError !== null) )
         {
            if($imageError !== null)
            {
                $Validation->errors()->add("urlImage", $imageError);
            }

            if($videoError !== null)
            {
                $Validation->errors()->add("urlVideo", $videoError);
            }

            return Reply::back(400, $Validation);
        }

        //update blog
        $Blog->lang         = Input::get("lang");
        $Blog->message      = Input::get("message");
        $Blog->messageTitle = Input::get("messageTitle");

        //save it
        Record::save($Blog, "Save a new blog.");

        return Reply::redirect("/blog", 202);
    }

    //DELETE /blog/{idBlog}
    public function destroy($idBlog)
    {
        //get Blog
        $Blog = Blog::find($idBlog);

        //check Blog
        if($Blog === null)
        {
            return Reply::make("pageError", 404);
        }

        //delete it
        Record::remove($Blog, "Blog deleted by admin.");

        return Reply::redirect("/blog", 202);
    }
}
