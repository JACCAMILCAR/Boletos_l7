<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Boleto;
Route::get('/', function () {
     $boletos = Boleto::all();
    foreach($boletos as $boleto){
        echo 'Usuario: '.$boleto->usuario->name.'<br/>';
        echo 'Nombre: '.$boleto->cliente->primerNombre.'<br/>';
        echo 'Apellido: '.$boleto->cliente->apellidoPaterno.'<br/>';
        echo 'Origen: '.$boleto->origen.'<br/>';
        echo 'Destino: '.$boleto->destino.'<br/>';
        echo 'Número de Asiento: '.$boleto->numeroAsiento.'<br/>';
        echo 'Precio: '.$boleto->precio.'<br/>';
        echo 'Fecha: '.$boleto->fecha.'<br/>';
        echo 'Hora: '.$boleto->hora.'<br/>';
        echo 'Placa: '.$boleto->bus->placa.'<br/>';
        echo '<hr/>';
    }
    // var_dump($boletos);
    // die();
    // return view('welcome');
});
