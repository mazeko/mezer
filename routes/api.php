<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MenuControler;
use App\Http\Controllers\API\SubmenuController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function(){
    Route::prefix("auth")->group(function(){
        Route::controller(AuthController::class)->group(function(){
            Route::post("/login", "login");

            Route::middleware("jwt.verify")->group(function(){
                Route::post("/logout", 'logout');
            });
        });
    });

    Route::middleware("jwt.verify")->group(function(){
        Route::prefix("menu")->group(function(){
            Route::controller(MenuControler::class)->group(function(){
                Route::post("/store", "store");
                Route::put("/{id}/update", "update");
            });
        });

        Route::prefix("submenu")->group(function(){
            Route::controller(SubmenuController::class)->group(function(){
                Route::get("/", "index");
                Route::post("/store", "store");
                Route::put("/{id}/update", "update");
            });
        });
    });
});