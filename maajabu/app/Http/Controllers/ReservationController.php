<?php

namespace App\Http\Controllers;

use App\Http\Resources\Reservation as ResourcesReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::all();
        return ResourcesReservation::collection($reservations);
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
        if (Reservation::create($request->all())) {
            return [
                "success" => "true",
                "message" => "Enregistrement effectué"
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        return [
            'id' => $reservation->id,
            'user' => $reservation->user->name,
            'date' => $reservation->date_reservation
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
        if ($reservation->update($request->all())) {
            return [
                "success" => "true",
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        if ($reservation->delete()) {
            return [
                "success" => "true",
                "message" => "Enregistrement supprimé"
            ];
        }
    }
}
