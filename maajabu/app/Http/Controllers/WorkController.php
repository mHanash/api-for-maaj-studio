<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Work as ResourcesWork;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $works = Work::all();
        return ResourcesWork::collection($works);
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
        if (Work::create($request->all())) {
            return [
                "success" => "true",
                "message" => "Enregistrement effectué"
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
        $engineer = $work->engineer->name;
        $artist = $work->artist->name;
        $work_name = $work->name;
        $description = $work->description;
        return response()->json([
            'id' => $work->id,
            'name' => $work_name,
            'description' => $description,
            'engineer' => $engineer,
            'artist' => $artist
        ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        //
        if (Gate::allow('access-admin')) {
            abort("403");
        }
        if ($work->update($request->all())) {
            return [
                "success" => "true",
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
        if (Gate::allow('access-admin')) {
            abort("403");
        }
        if ($work->delete()) {
            return [
                "success" => "true",
                "message" => "Enregistrement supprimé"
            ];
        }

    }
}
