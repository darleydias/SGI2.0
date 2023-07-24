<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sistema::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Sistema::create($request->all());
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Sistema::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sistema = Sistema::findOrFail($id);
        return $sistema->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $sistema = Sistema::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id sistema não existe '];
            }
            Sistema::destroy($id);
            return ['msg'=>'sistema '.$setor->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir setsistemaor '];
        }
    }
    public function listaFuncSistema(string $id)
    {
         $sistema = Sistema::findOrFail($id);
         if($sistema){
             $response = [
                   'funcionalidade'=>$sistema->funcionalidade
             ];
         }
        return $response;
    }
    
}
