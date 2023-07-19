<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producao;
use App\Models\Produto;
use App\Models\Cliente;

class ProducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return Producao::all();
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível exibir os dados da produção '];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            try{
                try{
                    $idProduto =Produto::findOrFail($request->produto_id);
                }catch (\Exception $e) {
                    return "id do produto nao existe";       
                }    
                $idCliente =Cliente::findOrFail($request->cliente_id);
            }catch (\Exception $e){
                return "id do Cliente nao existe";       
            }    
            $producao = Producao::create($request->all());
            return $producao;
        }catch (\Exception $e) {
            return "Não foi possível cadastrar produção";       
        }  
         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return Producao::findOrFail($id);
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível encontrar produção '];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            try{
                try{
                    $idProduto =Produto::findOrFail($request->produto_id);
                }catch (\Exception $e) {
                    return "id do produto nao existe";       
                }    
                $idCliente =Cliente::findOrFail($request->cliente_id);
            }catch (\Exception $e){
                return "id do Cliente nao existe";       
            }    

            $producao = Producao::findOrFail($id);
            $result =  $producao->update($request->all());
            return ['msg'=>'Producao '.$producao->opNum.' Atualizada com sucesso'];
        }catch (\Exception $e) {
            return "Não foi possível atualizar produção";       
        }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $producao = Producao::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id Produção não existe '];
            }
            Producao::destroy($id);
            return ['msg'=>'Produção '.$producao->opNum.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir produção '];
        }
    }
}
