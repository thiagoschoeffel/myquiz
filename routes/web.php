<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;

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

Route::get('/registrar', [RegisterController::class, 'create'])->name('register-create');
Route::post('/registrar/salvar', [RegisterController::class, 'store'])->name('register-store');

Route::get('/entrar', [LoginController::class, 'index'])->name('login');
Route::post('/entrar/processar', [LoginController::class, 'process'])->name('login-process');
Route::get('/sair', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/questionarios', [QuizController::class, 'index'])->name('quiz');
Route::get('/questionarios/cadastrar', [QuizController::class, 'create'])->name('quiz-create');
Route::post('/questionarios/cadastrar/salvar', [QuizController::class, 'store'])->name('quiz-store');
Route::delete('/questionarios/remover/{quiz_id}', [QuizController::class, 'destroy'])->name('quiz-destroy');

Route::get('/questionarios/{quiz_id}/perguntas', [QuestionController::class, 'index'])->name('question');
Route::get('/questionarios/{quiz_id}/perguntas/cadastrar', [QuestionController::class, 'create'])->name('question-create');
Route::post('/questionarios/{quiz_id}/perguntas/cadastrar/salvar', [QuestionController::class, 'store'])->name('question-store');
Route::delete('/questionarios/{quiz_id}/perguntas/remover/{question_id}', [QuestionController::class, 'destroy'])->name('question-destroy');

Route::get('/questionarios/{quiz_id}/respostas', [AnswerController::class, 'index'])->name('answer');
Route::get('/questionarios/{quiz_id}/responder', [AnswerController::class, 'create'])->name('answer-create');
Route::post('/questionarios/{quiz_id}/responder/salvar', [AnswerController::class, 'store'])->name('answer-store');
