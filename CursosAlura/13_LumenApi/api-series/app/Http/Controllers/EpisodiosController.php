<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    /*
    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {
        $episodio = Episodio::create($request->all());

        return response()->json($episodio, 201);
    }

    public function show(int $id)
    {
        $episodio = Episodio::find($id);

        if (!$episodio) {
            return response()->json('', 204);
        }

        return response()->json($episodio);
    }

    public function update(int $id, Request $request)
    {
        $episodio = Episodio::find($id);

        if (!$episodio) {
            return response()->json([ 'erro' => 'Episodio não localizada' ], 404);
        }

        $episodio->fill($request->all());
        $episodio->save();

        return response()->json($episodio);
    }

    public function destroy(int $id)
    {
        $qtdeRemoved = Episodio::destroy($id);

        if ($qtdeRemoved === 0) {
            return response()->json(['erro' => 'Episodio não localizada'], 404);
        }

        return response()->json('', 204);
    }
    */
}
