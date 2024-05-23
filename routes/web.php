<?php

use Illuminate\Support\Facades\Route;
use YourNamespace\ContactForm\Http\Controllers\ContactFormController;

Route::get('contact', [ContactFormController::class, 'showForm'])->name('contact.show');
Route::post('contact', [ContactFormController::class, 'submitForm'])->name('contact.submit');
Route::get('contact/thank-you', [ContactFormController::class, 'thankYou'])->name('contact.thankyou');

Route::middleware('auth')->group(function() {
    Route::get('admin/contacts', [ContactFormController::class, 'listContacts'])->name('admin.contacts.list');
});