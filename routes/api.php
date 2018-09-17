<?php
//all api route has an URL prefix "api"
//for example, you can call GET account with URL /apii/account

Route::group(["middleware" => ["checkApi", "checkToken"]], function () {
    Route::get   ("/account",           "AccountController@index"   );
    Route::post  ("/account",           "AccountController@store"   );
    Route::get   ("/account/{idUser}",  "AccountController@show"    )->middleware("checkIdUser");
    Route::get   ("/blog",              "BlogController@index"      );
    Route::get   ("/blog/{idBlog}",     "BlogController@show"       )->middleware("checkAdmin");
    Route::get   ("/token",             "TokenController@index"     );
    Route::get   ("/token/{idToken}",   "TokenController@show"      )->middleware("checkIdToken");
    Route::delete("/token/{idToken}",   "TokenController@destroy"   )->middleware("checkIdToken");
});
