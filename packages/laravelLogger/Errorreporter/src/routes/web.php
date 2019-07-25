
<?php
// MyVendor\contactform\src\routes\web.php
Route::get('dashboard', function () {
    // return 'Hello from the contact form package';
    return view('contactform::contact');
});
Route::post('dashboard', function () {
    return 'Hello from the contact form package';
})->name('contact');
