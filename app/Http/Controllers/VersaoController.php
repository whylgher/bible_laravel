<?php

namespace App\Http\Controllers;

use App\Models\Versao;
use Illuminate\Http\Request;

class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versao::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Versao::create($request->all())){
            return response()->json([
                'message' => 'Versao cadastrado com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar Versao.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $versao = Versao::find($id);
        if($versao) {
            $versao->idioma;
            $versao->livros;
            return $versao;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar Versao.'
        ], 404);
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
        $versao = Versao::find($id);

        if($versao) {
            $versao->update($request->all());
            return response()->json([
                'message' => 'Versao atualizado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao atualizar Versao.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $versao = Versao::find($id);

        if($versao){
            Versao::destroy($id);
            return response()->json([
                'message' => 'Versao deletado',
               ], 404
            );
        }
        return response()->json([
            'message' => 'Erro ao deletar Versao',
           ], 404
        );
    }
}

