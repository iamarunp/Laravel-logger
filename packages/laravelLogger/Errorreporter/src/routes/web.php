
<?php
// MyVendor\dashboard\src\routes\web.php
Route::get('dashboard', function () {
    // return 'Hello from the contact form package';
    return view('dashboard::contact');
});
Route::get('dashboard/request-Details', function () {
    // return 'Hello from the contact form package';
    return view('dashboard::request-details');
});

Route::get('dashboard/request-Details-2', function () {
    // return 'Hello from the contact form package';
    return view('dashboard::detail');
});
Route::post('dashboard', function () {
    return 'Hello from the contact form package';
})->name('contacts');


Route::group(['prefix' => 'api','namespace' => '\laravelLogger\Errorreporter\Controllers'], function () {


    Route::get('logs', 'LoggerController@index')->middleware('Rlogger');
    Route::get('request-logs', 'LoggerController@requestLogs')->middleware('Rlogger');

});
