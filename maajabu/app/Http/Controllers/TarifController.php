<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tarif as ResourcesTarif;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarifs = Tarif::all();
        return ResourcesTarif::collection($tarifs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Tarif::create($request->all())) {
            return [
                "success" => "true",
                "message" => "Enregistrement effectué"
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        //
        return response()->json([
            'id' => $tarif->id,
            'name' => $tarif->name,
            'description' => $tarif->description,
            'price' => $tarif->price
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarif $tarif)
    {
        //
        if ($tarif->update($request->all())) {
            return [
                "success" => "true",
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarif $tarif)
    {
        //
        if ($tarif->delete()) {
            return [
                "success" => "true",
                "message" => "Enregistrement supprimé"
            ];
        }
    }
}
