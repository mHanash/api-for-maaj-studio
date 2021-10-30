<?php

namespace App\Http\Controllers;

use App\Http\Resources\Engineer as ResourcesEngineer;
use App\Models\Engineer;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $engineers = Engineer::all();
        return ResourcesEngineer::collection($engineers);
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

        if (Engineer::create($request->all())) {
            return [
                "success" => "true",
                "message" => "Enregistrement effectué"
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function show(Engineer $engineer)
    {
        //
        return response()->json([
            'id' => $engineer->id,
            'name' => $engineer->name,
            'year_experience' => $engineer->year_experience,
            'img_url' => $engineer->img_url
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Engineer $engineer)
    {
        //
        if ($engineer->update($request->all())) {
            return [
                "success" => "true",
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engineer $engineer)
    {
        //
        if ($engineer->delete()) {
            return [
                "success" => "true",
                "message" => "Enregistrement supprimé"
            ];
        }
    }
}
