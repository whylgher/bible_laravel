<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Idioma::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Idioma::create($request->all())){
            return response()->json([
                'message' => 'Idioma cadastrado com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar idioma.'
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
        $idioma = Idioma::find($id);
        if($idioma) {
            $idioma->versoes;
            return $idioma;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar idioma.'
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
        $idioma = Idioma::find($id);

        if($idioma) {
            $idioma->update($request->all());
            return response()->json([
                'message' => 'Idioma atualizado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao atualizar idioma.'
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
        $idioma = Idioma::find($id);

        if($idioma){
            Idioma::destroy($id);
            return response()->json([
                'message' => 'Idioma deletado',
               ], 404
            );
        }
        return response()->json([
            'message' => 'Erro ao deletar Idioma',
           ], 404
        );
    }
}
