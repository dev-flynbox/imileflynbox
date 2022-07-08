<?php

Route::group(['namespace' => 'Waqarali7\Imilezcart\Http\Controllers'],function (){
//    Route::get('imilezcart/test', 'ImilezcartController@test');
    Route::get('imilezcart/test', function (){
        dd("test");
    });
});
