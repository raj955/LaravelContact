<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImportContactController;

Route::resource('contacts', ContactController::class);
Route::get('xml-import-contacts', [ImportContactController::class, 'showImportForm'])->name('xmlcontacts.import');;
Route::post('xml-import-data', [ImportContactController::class, 'import'])->name('xmlDatacontacts.import');
