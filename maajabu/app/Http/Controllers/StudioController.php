<?php

namespace App\Http\Controllers;

use App\Http\Resources\Service as ResourcesService;
use App\Http\Resources\Studio as ResourcesStudio;
use App\Models\Service;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $studios = Studio::all();
        $services = Service::all();

        return [
            'studios' => ResourcesStudio::collection($studios),
            'services' => ResourcesService::collection($services)
        ];
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
        if (Studio::create($request->all())) {
            return [
                'success' => 'true',
                'message' => 'Enregistrement effectué'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        //
        return $studio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studio $studio)
    {
        //
        if ($studio->update($request->all())) {
            return [
                "success" => "true",
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studio $studio)
    {
        //
        if ($studio->delete()) {
            return [
                "success" => "true",
                "message" => "La modification a reussie"
            ];
        }
    }
}
