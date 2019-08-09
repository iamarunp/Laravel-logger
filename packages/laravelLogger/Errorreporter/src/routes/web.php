
<?php
// MyVendor\contactform\src\routes\web.php
Route::get('dashboard', function () {
    // return 'Hello from the contact form package';
    return view('contactform::contact');
});

Route::post('dashboard', function () {
    return 'Hello from the contact form package';
})->name('contacts');
Route::group(['namespace' => '\laravelLogger\Errorreporter\Controllers'], function () {
    Route::get('api/msg', 'LoggerController@cabinet');
    Route::get('api/{dd}', 'LoggerController@cabinet');

});

Route::group(['prefix' => 'api','namespace' => '\laravelLogger\Errorreporter\Controllers'], function () {


    Route::get('logs', 'LoggerController@index')->middleware('Rlogger');
    Route::get('request-logs', 'LoggerController@requestLogs')->middleware('Rlogger');

});
