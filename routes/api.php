<?php

Route::group(["middleware" => ["checkApi"]], function () {
    //Route::resource("api/account",      "AccountController",    array("only" => array("update", "destroy")));
    //Route::resource("api/blog",         "BlogController",       array("only" => array("index", "create", "show", "store", "update", "destroy")));
    //Route::resource("api/contact",      "ContactController",    array("only" => array("store")));
    //Route::resource("api/lost",         "LostController",       array("only" => array("store")));
    //Route::resource("api/view",         "ViewController",       array("only" => array("index", "show")));
});
