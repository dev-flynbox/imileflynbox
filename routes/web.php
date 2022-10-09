<?php

use Flynbox\Imileflynbox\Http\Controllers\ImilezcartController;

Route::group(['namespace' => 'Flynbox\Imileflynbox\Http\Controllers'],function (){
    Route::get('track', [
        ImilezcartController::class, 'imileTrack'
    ])->name('order.imile.track');
});