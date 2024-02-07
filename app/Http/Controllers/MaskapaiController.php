<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flight;
use App\Models\Airline;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlineName = auth()->user()->name;
        // Ambil data penerbangan sesuai dengan id airline
        $airline = Airline::where('name', $airlineName)->first();
        if ($airline) {
            // Set the airline_id value
            $airlineId = $airline->id;
        } else {
            // Handle the case where the airline is not found (set a default value or throw an exception)
            $airlineId = 'default_airline_id';
        }
        $flights = Flight::where('airline_id', $airlineId)->get();
        return view('maskapai.dashboard', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the authenticated user's airline name
        $airlineName = auth()->user()->name;

        // Get the airline record from the database
        $airline = Airline::where('name', $airlineName)->first();
        if ($airline) {
            // Set the airline_id value
            $airlineId = $airline->id;
        } else {
            // Handle the case where the airline is not found (set a default value or throw an exception)
            $airlineId = 'default_airline_id';
        }
        return view('maskapai.flight.add', ['airlineId' => $airlineId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function searchLaporan(Request $request)
    // {
    //     // Retrieve the departure city from the request
    //     $departureCity = $request->input('departure_city');

    //     // Query transactions where departure city matches or airline name matches
    //     $transactions = Flight::where('departure_city', 'like', '%' . $departureCity . '%')
    //         ->orWhereHas('airline', function ($query) use ($departureCity) {
    //             $query->where('name', 'like', '%' . $departureCity . '%');
    //         })->get();

    //     // Pass the results to the view
    //     return view('maskapai.laporan.berhasil', compact('transactions'));
    // }

    public function searchLaporan(Request $request)
    {
        $airlineName = Auth::user()->name; // Adjust this based on your actual authentication setup

        $departureCity = $request->input('departure_city');

        $transactions = Transaction::where('payment_status', 'Berhasil')
            ->whereHas('flight', function ($query) use ($departureCity, $airlineName) {
                $query->where('departure_city', 'like', '%' . $departureCity . '%')
                    ->whereHas('airline', function ($query) use ($airlineName) {
                        $query->where('name', $airlineName);
                    });
            })->get();

        $totalIncome = $transactions->sum('total_price');

        return view('maskapai.laporan.berhasil', compact('transactions', 'totalIncome'));
    }
}
