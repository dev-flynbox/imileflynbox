<?php

use DevFlynbox\Imileflynbox\Http\Controllers\ImileflynboxController;

Route::group(['namespace' => 'DevFlynbox\Imileflynbox\Http\Controllers'],function (){
    Route::get('track', [
        ImileflynboxController::class, 'imileTrack'
    ])->name('order.imile.track');
});