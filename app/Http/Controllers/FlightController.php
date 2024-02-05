<?php

namespace App\Http\Controllers;

use App\Models\flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maskapai.flight.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'airline_id' => 'required',
            'no_flight' => 'required',
            'departure_city' => 'required',
            'departure_time' => 'required',
            'departure_date' => 'required',
            'arrival_city' => 'required',
            'arrival_time' => 'required',
            'arrival_date' => 'required',
            'seat_availability' => 'required|integer',
            'price' => 'required|integer', // Jika price merupakan nilai integer
        ]);

        Flight::create($request->all());

        return redirect()->route('maskapai.dashboard');
    }


    /**
     * Display the specified resource.
     */
    public function show(flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(flight $flight, $id)
    {
        $flight = Flight::find($id);
        return view('maskapai.flight.edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'airline_id' => 'required',
            'no_flight' => 'required',
            'departure_city' => 'required',
            'departure_time' => 'required',
            'departure_date' => 'required',
            'arrival_city' => 'required',
            'arrival_time' => 'required',
            'arrival_date' => 'required',
            'seat_availability' => 'required|integer',
            'price' => 'required|integer',
        ]);

        // Ambil data penerbangan berdasarkan ID
        $flight = Flight::find($id);

        // Periksa apakah data penerbangan ditemukan
        if (!$flight) {
            return redirect()->route('maskapai.dashboard')->with('error', 'Data penerbangan tidak ditemukan.');
        }

        // Update data penerbangan
        $flight->update($request->all());

        return redirect()->route('maskapai.dashboard')->with('success', 'Data penerbangan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $flight = Flight::find($id);
        $flight->delete();

        return redirect()->route('maskapai.dashboard');
    }

    public function searchFlights(Request $request)
    {
        $departureCity = $request->input('departure_city');

        // Assuming you have a Flight model and an 'airline' relationship
        $flights = Flight::where('departure_city', 'like', '%' . $departureCity . '%')
            ->orWhereHas('airline', function ($query) use ($departureCity) {
                $query->where('name', 'like', '%' . $departureCity . '%');
            })->get();

        return view('user.dashboard', compact('flights'));
    }
}
