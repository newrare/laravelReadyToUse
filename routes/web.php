<?php

Route::group(["middleware" => ["checkWeb"]], function () {
    Route::get  ("/",                           "HomeController@page"                       );
    Route::get  ("/account",                    "AccountController@index"                   );
Route::post ("/account",                    "AccountController@store"                   );
Route::get  ("/account/{idUser}",           "AccountController@show"                    )->middleware("checkSession", "checkIdUser");
Route::put  ("/account/{idUser}",           "AccountController@update"                  )->middleware("checkSession", "checkIdUser");
//delete  /api/account/{idUser}
    Route::get  ("/blog",                       "BlogController@index"                      );
Route::post ("/blog",                       "BlogController@store"                      )->middleware("checkSession", "checkAdmin");
Route::get  ("/blog/{idBlog}",              "BlogController@show"                       )->middleware("checkSession", "checkAdmin");
Route::put  ("/blog/{idBlog}",              "BlogController@update"                     )->middleware("checkSession", "checkAdmin");
//delete  /api/blog/{idBlog}
Route::get  ("/connection",                 "ConnectionController@index"                );
Route::post ("/connection",                 "ConnectionController@store"                );
Route::get  ("/connection/off",             "ConnectionController@logOut"               );
Route::get  ("/contact",                    "ContactController@index"                   );
Route::post ("/contact",                    "ContactController@store"                   );
Route::get  ("/email/valid",                "EmailController@valid"                     )->middleware("checkSession");
Route::get  ("/email/{idUser}/{codeEmail}", "EmailController@valided"                   );
Route::get  ("/google",                     "GoogleController@redirectToProvider"       );
Route::get  ("/googleCallBack",             "GoogleController@handleProviderCallBack"   );
Route::get  ("/help/view",                  "HelpController@viewIndex"                  );
Route::get  ("/help/view/{idView}",         "HelpController@viewShow"                   );
Route::get  ("/lang/{codeLang}",            "LangController@change"                     );
Route::get  ("/lost",                       "LostController@index"                      );
Route::post ("/lost",                       "LostController@store"                      );
Route::get  ("/notJavascript",              "NotJavascriptController@index"             );
Route::get  ("/service",                    "ServiceController@index"                   )->middleware("checkSession");
Route::get  ("/token",                      "TokenController@index"                     )->middleware("checkSession");
Route::post ("/token",                      "TokenController@store"                     )->middleware("checkSession");
});
