<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimento;

class SeguimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seguimento = Seguimento::all();  
        if(empty($seguimento)){
            return ['msg'=>'Nenhum seguimento cadastrado'];
        }else{
            return $seguimento;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return Seguimento::create($request->all());
        }catch (\Exception $e) {
            return "Nome não informado";       
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return Seguimento::findOrFail($id);
        }catch (\Exception $e) {
            return "seguimento não encontrado";       
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $seguimento = Seguimento::findOrFail($id);
            $seguimento->update($request->all());
            return ['msg'=>'seguimento atualizado'];
        }catch (\Exception $e) {
            return "seguimento não encontrado";       
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Seguimento::destroy($id);
        if($result==0){
            return ['msg'=>'nenhum item removido'];
        }else{
            return ['msg'=>'item removido'];
        }
    }
    /**
     * Display the specified resource.
     */
    public function clientes(string $id)
    {
        try{
            $seguimento = Seguimento::findOrFail($id);
            return $seguimento->clientes;
        }catch (\Exception $e) {
            return "seguimento não encontrado";       
        }   
    }
}
