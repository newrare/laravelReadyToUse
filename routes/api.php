<?php
//all api route has an URL prefix "api"
//for example, you can call GET account with URL /apii/account

Route::group(["middleware" => ["checkApi"]], function () {
    Route::get  ("/account",                    "AccountController@index"                       )->middleware("checkToken");
    Route::get  ("/account/{idUser}",           "AccountController@show"                        )->middleware("checkToken", "checkIdUser");
    //Route::resource("/account", "AccountController", array("only" => array("index")));
    //Route::resource("api/account",      "AccountController",    array("only" => array("update", "destroy")));
    //Route::resource("api/blog",         "BlogController",       array("only" => array("index", "create", "show", "store", "update", "destroy")));
    //Route::resource("api/contact",      "ContactController",    array("only" => array("store")));
    //Route::resource("api/lost",         "LostController",       array("only" => array("store")));
//Route::resource("view",         "HelpController",       array("only" => array("viewIndex", "viewShow")));
});
