<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimentacao;
use Illuminate\Support\Facades\Log;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::warning('Usuário acessando todas as movimentaçoes');
        return Movimentacao::all();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->id_produto;
        //  return Movimentacao::create($request->all());
        $quant = ($request->quant/2 );
        $result =[
            'quant'=>$quant,
            'id_produto'=>$request->id_produto
        ];
        Log::info('Movimentação atualizada');
        Log::channel('slack')->info('Something happened!');
        return Movimentacao::create($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
