<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionalidade;
use App\Models\Grupo;
use App\Models\User;
use App\Models\Sistema;
use App\Http\Requests\FuncionalidadeRequest;

class FuncionalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Funcionalidade::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuncionalidadeRequest $request)
    {   
        try{
            $sistema = Sistema::findOrFail($request->sistema_id);
        }catch(\Exception $e){
            return ['msg'=>'id do sistema informado não exite'];
        }
        return Funcionalidade::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Funcionalidade::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FuncionalidadeRequest $request, string $id)
    {
        try{
            $func =  Funcionalidade::findOrFail($id);
        }catch(\Exception $e){
            return ['msg'=>'funcionalidade não exite'];
        }
        try{
            $sistema = Sistema::findOrFail($request->sistema_id);
        }catch(\Exception $e){
            return ['msg'=>'id do sistema informado não exite'];
        }

        $func->update($request->all());
        return $func;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Funcionalidade::destroy($id);
    }
     /**  CRIA UMA ASSOCIACAO NA TABELA PIVOT FUNCIONALIDADE-GRUPO  **/
    public function funcionalidadeGrupo(Request $request)
     {
         $func = Funcionalidade::findOrFail($request->idFunc);
         // Testa se já existe a associação para aquele grupo_id e funcionalidade_id
         $funcao = $func->grupo()
                    ->where('grupo_id', $request->idGrupo)
                    ->where('funcionalidade_id', $request->idFunc)
                    ->first();
        if (is_null($funcao)) {
            $func->grupo()->attach($request->idGrupo);
            $grupo=Grupo::findOrFail($request->idGrupo);
            return [
                'usuario'=>$func->nome,
                'grupo'=>$grupo->nome
            ];
        }else{
            return ['msg'=>'Já associados'];
        }

        
     }
     
     public function excluiFuncGrupo(Request $request)    {
        $func = Funcionalidade::findOrFail($request->idFunc);
        $func->grupo()->detach($request->idGrupo);
        $grupo=Grupo::findOrFail($request->idGrupo);
        return [
            'msg'=>'excluido com sucesso'
        ];
    }

    /**  LISTA FUNCIONALIDADES DE UM GRUPO **/
    public function listaFuncionalidadesGrupo($id){
        try {
            $grupo = Grupo::findOrFail($id);
            return $grupo->funcionalidade;
        }catch (\Exception $e) {
            return "Funcionalidade não associada";       
        }    
    }
        /**  LISTA GRUPOS ONDE UMA FUNCIONALIDADE ESTÁ **/
        public function listaGruposFuncionalidade($id){
        try {
            $func = Funcionalidade::findOrFail($id);
            return $func->grupo;            
        }catch (\Exception $e) {
                return "Funcionalidade não associada";       
        }
    }
    /**  MONTA MENU DO USUARIO LOGADO **/
    public function montaMenu($id){
        try {
            $usu = User::findOrFail($id);
            return $usu->menu();            
        }catch (\Exception $e) {
            return "Usuario não encontrado";       
        }
    }
     /**  MONTA MENU DO USUARIO LOGADO **/
     public function montaMenuEmail(Request $request){
        try {
            $usu = User::all()->where('email',$request->email)->first();
            if(is_null($usu)){
                return ['msg'=>'Usuário não encontrado'];
            }else{
                if(empty($usu->menu())){
                    return ['msg'=>'Nenhum item de menu para esse usuário'];
                }else{
                    return $usu->menu();
                }
            }           
        }catch (\Exception $e) {
            return "Usuario não encontrado";       
        }
    }
    
}
