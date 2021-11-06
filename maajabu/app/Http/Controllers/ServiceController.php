<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Service as ResourcesService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return ResourcesService::collection($services);
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
        if (Gate::allow('access-admin')) {
            abort("403");
        }
        if (Service::create($request->all())) {
            return [
                "success" => true,
                "message" => "Enregistrement effectué"
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        $tarif = $service->tarif->name;

        return response()->json([
            'id' => $service->id,
            'name' => $service->name,
            'description' => $service->desciption,
            'img_url' => $service->img_url,
            'tarif' => $tarif
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        if (Gate::allow('access-admin')) {
            abort("403");
        }
        if ($service->update($request->all())) {
            return [
                "success" => true,
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        if (Gate::allow('access-admin')) {
            abort("403");
        }
        if ($service->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé"
            ];
        }
    }
}
