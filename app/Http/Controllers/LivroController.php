<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livro = Livro::where('nome', '=', $request['nome'])->first();

        if($livro == null){
            if( Livro::create($request->all())){
                return response()->json([
                    'message' => 'Livro cadastrado com sucesso',
                    ], 201
                );
            }
            return response()->json([
                    'message' => 'Erro ao cadastrar Livro',
                ], 404
            );
        }
        return response()->json([
            'message' => 'Livro já existente',
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
        $livro = Livro::find($id);
        if($livro){
            $livro->testamento;
            $livro->versiculos;
            $livro->versao;
            return $livro;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar Livro',
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
        $livro = Livro::find($id);

        if($livro){
            $livro->update($request->all());
            return $livro;
        }
        return response()->json([
            'message' => 'Erro ao atualizar Livro',
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
        $livro = Livro::find($id);

        if($livro){
            Livro::destroy($id);
            return response()->json([
                'message' => 'Livro deletado',
               ], 404
            );
        }
        return response()->json([
            'message' => 'Erro ao deletar Livro',
           ], 404
        );
    }
}
