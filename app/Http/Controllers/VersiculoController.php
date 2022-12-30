<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Versiculo::create($request->all())){
            return response()->json([
                'message' => 'Versiculo cadastrado com sucesso',
                ], 201
            );
        }
        return response()->json([
                'message' => 'Erro ao cadastrar Versiculo',
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
        $versiculo = Versiculo::find($id);
        if($versiculo){
            return $versiculo;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar Versiculo',
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
        $versiculo = Versiculo::find($id);

        if($versiculo){
            $versiculo->update($request->all());
            return $versiculo;
        }
        return response()->json([
            'message' => 'Erro ao atualizar Versiculo',
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
        $versiculo = Versiculo::find($id);

        if($versiculo){
            Versiculo::destroy($id);
            return response()->json([
                'message' => 'Versiculo deletado',
               ], 404
            );
        }
        return response()->json([
            'message' => 'Erro ao deletar Versiculo',
           ], 404
        );
    }
}
