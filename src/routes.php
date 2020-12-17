<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package! picmatch';
// });

// Route::get('picmatch/test', 'EdgeWizz\Picmatch\Controllers\PicmatchController@test')->name('test');

Route::post('fmt/picmatch/store', 'EdgeWizz\Picmatch\Controllers\PicmatchController@store')->name('fmt.picmatch.store');

Route::post('fmt/picmatch/csv_upload', 'EdgeWizz\Picmatch\Controllers\PicmatchController@csv_upload')->name('fmt.picmatch.csv');
