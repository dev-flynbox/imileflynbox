<?php

use DevFlynbox\Imileflynbox\Http\Controllers\ImilezcartController;

Route::group(['namespace' => 'DevFlynbox\Imileflynbox\Http\Controllers'],function (){
    Route::get('track', [
        ImilezcartController::class, 'imileTrack'
    ])->name('order.imile.track');
});