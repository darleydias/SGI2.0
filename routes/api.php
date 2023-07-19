<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\FuncionalidadeController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\PermissaoMiddleware;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\SeguimentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\TipoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProducaoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//  ##################    SISTEMA    ##################
Route::get('/sistema',[SistemaController::class,'index']);
Route::post('/sistema',[SistemaController::class,'store']);
Route::get('/sistema/{id}',[SistemaController::class,'show']);
Route::put('/sistema/{id}',[SistemaController::class,'update']);
Route::delete('/sistema/{id}',[SistemaController::class,'destroy']);
Route::get('/sistema/{id}/funcionalidades',[SistemaController::class,'listaFuncSistema']);

//  ##################    GRUPOS    ##################
Route::get('/grupo',[GrupoController::class,'index']);
Route::post('/grupo',[GrupoController::class,'store']);
Route::get('/grupo/{id}',[GrupoController::class,'show']);
Route::put('/grupo/{id}',[GrupoController::class,'update']);
Route::delete('/grupo/{id}',[GrupoController::class,'destroy']);
Route::patch('/grupo/{id}',[GrupoController::class,'desativa']);
Route::get('/grupo/{id}/funcionalidades',[GrupoController::class,'listaFuncGrupo']);/**  CRIA UM REGISTRO NA TABELA DE UM USUARIO EM UM GRUPO **/
Route::get('/grupo/{id}/usuarios',[GrupoController::class,'listaUsuariosGrupo']); /**  LISTA USUARIOS DE UM GRUPO **/

//  ##################    USUARIO    ##################
Route::get('/usuario/{id}/grupos',[GrupoController::class,'listaGruposUsuario']);/**  LISTA GRUPOS DE UM USUARIO EM UM GRUPO **/
Route::patch('/usuario/{id}',[AuthController::class,'desativa']);
Route::get('/usuario',[AuthController::class,'index']);
//  ##################    INICIO - ROTAS LOGADAS E AUTORIZADAS    ##################
// Todo sistema que for logar e autorizar deveria apontar para as tabelas daqui, implementar o md abaixo
Route::group(['middleware'=>['auth:sanctum']],function(){
    //Route::get('/usuario',[AuthController::class,'index'])->middleware(PermissaoMiddleware::class);
});
//  ##################    FIM - ROTAS LOGADAS E AUTORIZADAS    ##################
Route::delete('/usuario/grupo',[GrupoController::class,'excluiUsuarioGrupo']);/**  EXCLUI UM REGISTRO NA TABELA DE UM USUARIO EM UM GRUPO **/
Route::post('/usuario/grupo',[GrupoController::class,'usuarioGrupo']); // Insere um usuário e grupo na tabela pivot
Route::get('/usuario/{id}/funcionalidades',[AuthController::class,'usuFunc']);

//  ##################    FUNCIONALIDADE    ##################

Route::get('/funcionalidade',[FuncionalidadeController::class,'index']);
Route::post('/funcionalidade',[FuncionalidadeController::class,'store']);
Route::get('/funcionalidade/{id}',[FuncionalidadeController::class,'show']);
Route::put('/funcionalidade/{id}',[FuncionalidadeController::class,'update']);
Route::delete('/funcionalidade/{id}',[FuncionalidadeController::class,'destroy']);
Route::patch('/funcionalidade/{id}',[FuncionalidadeController::class,'desativa']);
Route::post('/funcionalidade/grupo',[FuncionalidadeController::class,'funcionalidadeGrupo']); // Associa funcionalidade a grupo
Route::get('/grupo/{id}/funcionalidades',[FuncionalidadeController::class,'listaFuncionalidadesGrupo']);/**  LISTA GRUPOS DE UM FUNCIONALIDADES **/
Route::get('/funcionalidade/{id}/grupos',[FuncionalidadeController::class,'listaGruposFuncionalidade']);/**  LISTA GRUPOS em que um FUNCIONALIDADE está **/
Route::delete('/func/grupo',[FuncionalidadeController::class,'excluiFuncGrupo']);
Route::get('/menu/usuario/{id}',[FuncionalidadeController::class,'montaMenu']);
Route::post('/menu/usuario/',[FuncionalidadeController::class,'montaMenuEmail']);


//  ##################    PERMISSAO    ##################

Route::get('/permissao',[PermissaoController::class,'index']);
Route::post('/permissao',[PermissaoController::class,'store']);
Route::get('/permissao/{id}',[PermissaoController::class,'show']);
Route::put('/permissao/{id}',[PermissaoController::class,'update']);
Route::delete('/permissao/{id}',[PermissaoController::class,'destroy']);


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/acl',[AuthController::class,'acl']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/logado/grupo/{id}',[GrupoController::class,'usuarioLogadoGrupo']);//Usuario logado inscreve-se num grupo
    Route::get('/logado/funcionalidades',[AuthController::class,'usuLogadoFunc']);
});

// ################### seguimento  #######################

Route::get('/seguimento',[SeguimentoController::class,'index']);
Route::post('/seguimento',[SeguimentoController::class,'store']);
Route::get('/seguimento/{id}',[SeguimentoController::class,'show']);
Route::put('/seguimento/{id}',[SeguimentoController::class,'update']);
Route::delete('/seguimento/{id}',[SeguimentoController::class,'destroy']);
Route::get('/seguimento/{id}/clientes',[SeguimentoController::class,'clientes']);

// ################### produto  #######################

Route::get('/produto',[ProdutoController::class,'index']);
Route::post('/produto',[ProdutoController::class,'store']);
Route::get('/produto/{id}',[ProdutoController::class,'show']);
Route::put('/produto/{id}',[ProdutoController::class,'update']);
Route::delete('/produto/{id}',[ProdutoController::class,'destroy']);


// ################### cliente  #######################

Route::get('/cliente',[ClienteController::class,'index']);
Route::post('/cliente',[ClienteController::class,'store']);
Route::get('/cliente/{id}',[ClienteController::class,'show']);
Route::patch('/cliente/{id}',[ClienteController::class,'desativa']);
Route::put('/cliente/{id}',[ClienteController::class,'update']);
Route::delete('/cliente/{id}',[ClienteController::class,'destroy']);

// ################### producao  #######################

Route::get('/producao',[ProducaoController::class,'index']);
Route::post('/producao',[ProducaoController::class,'store']);
Route::get('/producao/{id}',[ProducaoController::class,'show']);
Route::put('/producao/{id}',[ProducaoController::class,'update']);
Route::delete('/producao/{id}',[ProducaoController::class,'destroy']);

// ################### setor  #######################

Route::get('/setor',[SetorController::class,'index']);
Route::post('/setor',[SetorController::class,'store']);
Route::get('/setor/{id}',[SetorController::class,'show']);
Route::put('/setor/{id}',[SetorController::class,'update']);
Route::delete('/setor/{id}',[SetorController::class,'destroy']);

// ################### pessoa  #######################

Route::get('/pessoa',[PessoaController::class,'index']);
Route::post('/pessoa',[PessoaController::class,'store']);
Route::get('/pessoa/{id}',[PessoaController::class,'show']);
Route::put('/pessoa/{id}',[PessoaController::class,'update']);
Route::delete('/pessoa/{id}',[PessoaController::class,'destroy']);

// ################### servico  #######################

Route::get('/servico',[AuthController::class,'index']);
Route::post('/servico',[AuthController::class,'store']);
Route::get('/servico/{id}',[AuthController::class,'show']);
Route::put('/servico/{id}',[AuthController::class,'update']);
Route::delete('/servico/{id}',[AuthController::class,'destroy']);

// ################### trabalho  #######################

Route::get('/trabalho',[AuthController::class,'index']);
Route::post('/trabalho',[AuthController::class,'store']);
Route::get('/trabalho/{id}',[AuthController::class,'show']);
Route::put('/trabalho/{id}',[AuthController::class,'update']);
Route::delete('/trabalho/{id}',[AuthController::class,'destroy']);

// ################### tipoProduto  #######################

Route::get('/tipoProduto',[TipoProdutoController::class,'index']);
Route::post('/tipoProduto',[TipoProdutoController::class,'store']);
Route::get('/tipoProduto/{id}',[TipoProdutoController::class,'show']);
Route::put('/tipoProduto/{id}',[TipoProdutoController::class,'update']);
Route::delete('/trabtipoProdutoalho/{id}',[TipoProdutoController::class,'destroy']);




