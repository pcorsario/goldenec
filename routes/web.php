<?php

use Illuminate\Support\Facades\Route;
use App\Models\Servicio;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios/{servicio}/pdf', function (Servicio $servicio) {
    $pdf = Pdf::loadView('pdf.servicio', ['servicio' => $servicio]);
    return $pdf->stream('servicio-' . $servicio->id . '.pdf');
})->name('servicios.pdf');