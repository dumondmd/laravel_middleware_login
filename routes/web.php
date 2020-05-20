<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produtos', 'ProdutoControlador@index');

Route::post('/login', function(Request $req) {
	$login_ok = false;
	switch ($req->input('user')) {
		case 'joao':
			$login_ok = $req->input('passwd') === "senhajoao";
			break;

		case 'marcos':
			$login_ok = $req->input('passwd') === "senhamarcos";
			break;
		
		default:
			$login_ok = false;
			break;
	}
	if($login_ok) {
		return response("Login OK", 200);
	} else {
		return response("Error no login", 404);
	}
});