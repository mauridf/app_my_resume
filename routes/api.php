<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('jwt.auth')->group(function() {
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');

    Route::apiResource('pessoa', 'App\Http\Controllers\PessoaController');


    Route::apiResource('interesse', 'App\Http\Controllers\InteresseController');
    Route::apiResource('pessoa-interesse', 'App\Http\Controllers\PessoaInteresseController');


    Route::apiResource('formacao', 'App\Http\Controllers\FormacaoController');
    Route::apiResource('pessoa-formacao', 'App\Http\Controllers\PessoaFormacaoController');

    Route::apiResource('nivel-idioma', 'App\Http\Controllers\NivelIdiomaController');
    Route::apiResource('idioma', 'App\Http\Controllers\IdiomaController');
    Route::apiResource('pessoa-idioma', 'App\Http\Controllers\PessoaIdiomaController');


    Route::apiResource('certificacao', 'App\Http\Controllers\CertificacaoController');
    Route::apiResource('pessoa-certificacao', 'App\Http\Controllers\PessoaCertificacaoController');

    Route::apiResource('rede-social', 'App\Http\Controllers\RedeSocialController');
    Route::apiResource('pessoa-rede-social', 'App\Http\Controllers\PessoaRedeSocialController');


    Route::apiResource('experiencia', 'App\Http\Controllers\ExperienciaController');
    Route::apiResource('experiencia-skill', 'App\Http\Controllers\ExperienciaSkillController');
    Route::apiResource('pessoa-experiencia', 'App\Http\Controllers\PessoaExperienciaController');


    Route::apiResource('tipo-skill', 'App\Http\Controllers\TipoSkillController');
    Route::apiResource('skill', 'App\Http\Controllers\SkillController');
    Route::apiResource('pessoa-skill', 'App\Http\Controllers\PessoaSkillController');
});

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');