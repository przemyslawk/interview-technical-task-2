<?php

Route::group([
    'prefix' => 'transactions',
], static function () {
    Route::get('/', 'TransactionController@list');
});
