<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\PacientesComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Http\Livewire\Home::class);

Route::get('/especialidades', App\Http\Livewire\EspecialidadesComponent::class)->name('especialidades');

Route::get('/convenios', App\Http\Livewire\ConveniosComponent::class)->name('convenios');

Route::get('/pacientes', App\Http\Livewire\PacientesComponent::class)->name('pacientes');

Route::get('/medicos', App\Http\Livewire\MedicosComponent::class);