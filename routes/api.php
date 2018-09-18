<?php
//all api route has an URL prefix "api"
//for example, you can call GET account with URL /apii/account

Route::group(["middleware" => ["checkApi", "checkToken", "checkUser"]], function () {
    Route::get   ("/account",           "AccountController@index"   );
    Route::post  ("/account",           "AccountController@store"   );
    Route::get   ("/account/{idUser}",  "AccountController@show"    )->middleware("checkIdUser");
    Route::put   ("/account/{idUser}",  "AccountController@update"  )->middleware("checkIdUser");
    Route::delete("/account/{idUser}",  "AccountController@destroy" )->middleware("checkIdUser");
    Route::get   ("/blog",              "BlogController@index"      );
    Route::post  ("/blog",              "BlogController@store"      )->middleware("checkAdmin");
    Route::get   ("/blog/{idBlog}",     "BlogController@show"       )->middleware("checkIdBlog", "checkAdmin");
    Route::delete("/blog/{idBlog}",     "BlogController@destroy"    )->middleware("checkIdBlog", "checkAdmin");
    Route::post  ("/contact",           "ContactController@store"   );
    Route::post  ("/lost",              "LostController@store"      );
    Route::get   ("/token",             "TokenController@index"     );
    Route::post  ("/token",             "TokenController@store"     );
    Route::get   ("/token/{idToken}",   "TokenController@show"      )->middleware("checkIdToken");
    Route::delete("/token/{idToken}",   "TokenController@destroy"   )->middleware("checkIdToken");
});
