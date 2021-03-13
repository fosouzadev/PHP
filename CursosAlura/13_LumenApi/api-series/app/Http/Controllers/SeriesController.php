<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends BaseController
{
    public function __construct()
    {
        $this->classe = Serie::class;
    }

    /*
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        $serie = Serie::create(['nome' => $nome]);

        return response()->json($serie, 201);
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);

        if (!$serie) {
            return response()->json('', 204);
        }

        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);

        if (!$serie) {
            return response()->json([ 'erro' => 'Serie não localizada' ], 404);
        }

        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie);
    }

    public function destroy(int $id)
    {
        $qtdeRemoved = Serie::destroy($id);

        if ($qtdeRemoved === 0) {
            return response()->json(['erro' => 'Serie não localizada'], 404);
        }

        return response()->json('', 204);
    }
    */
}
