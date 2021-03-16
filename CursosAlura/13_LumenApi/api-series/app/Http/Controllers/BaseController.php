<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use App\Models\{Serie, Episodio};
use Illuminate\Http\Request;

abstract class BaseController
{
    protected $classe;

    public function index(Request $request)
    {
        //return $this->classe::all();

        //$offset = ($request->page - 1) * $request->per_page;
        //$series = $this->classe::query()->offset($offset)->limit($request->per_page)->get();
        //return response()->json([
        //   'offSet' => $offset,
        //   'data' => $series
        //]);

        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        $obj = $this->classe::create($request->all());

        return response()->json($obj, 201);
    }

    public function show(int $id)
    {
        $obj = $this->classe::find($id);

        if (!$obj) {
            return response()->json('', 204);
        }

        return response()->json($obj);
    }

    public function update(int $id, Request $request)
    {
        $obj = $this->classe::find($id);

        if (!$obj) {
            return response()->json([ 'erro' => 'Recurso não localizado' ], 404);
        }

        $obj->fill($request->all());
        $obj->save();

        return response()->json($obj);
    }

    public function destroy(int $id)
    {
        $qtdeRemoved = $this->classe::destroy($id);

        if ($qtdeRemoved === 0) {
            return response()->json(['erro' => 'Recurso não localizado'], 404);
        }

        return response()->json('', 204);
    }
}
