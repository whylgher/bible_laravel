<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Testamento::create($request->all())){
            return response()->json([
                'message' => 'Testamento cadastrado com sucesso',
                ], 201
            );
        }
        return response()->json([
                'message' => 'Erro ao cadastrar Testamento',
            ], 404
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testamento = Testamento::find($id);
        if($testamento){
            return $testamento;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar Testamento',
           ], 404
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testamento = Testamento::find($id);

        if($testamento){
            $testamento->update($request->all());
            return $testamento;
        }
        return response()->json([
            'message' => 'Erro ao atualizar Testamento',
           ], 404
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testamento = Testamento::find($id);

        if($testamento){
            Testamento::destroy($id);
            return response()->json([
                'message' => 'Testamento deletado',
               ], 404
            );
        }
        return response()->json([
            'message' => 'Erro ao deletar Testamento',
           ], 404
        );
    }
}
