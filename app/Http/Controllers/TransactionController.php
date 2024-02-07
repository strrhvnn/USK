<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\Airline;
use App\Models\Flight;
use App\Models\Customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flightId = session('flight_id');
        $customerId = session('customer_id');

        $flight = Flight::find($flightId);
        $customer = Customer::find($customerId);

        return view('user.transaction', compact('flight', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->flight_id = $request->input('flight_id');
        $transaction->customer_id = $request->input('customer_id');
        $transaction->airline_id = $request->input('airline_id');


        // Membuat no_booking dengan komponen yang diinginkan
        $no_booking = "BOOK_" . $transaction->customer->id . "_" . $transaction->flight->no_flight . "_" . auth()->id();
        $transaction->no_booking = $no_booking;


        $transaction->user_id = $request->input('user_id');
        $transaction->total_seat = $request->input('total_seat');
        $transaction->total_price = $request->input('total_price');
        $transaction->payment_status = $request->input('payment_status');

        // Simpan data transaksi
        $transaction->save();
        // Bersihkan session setelah transaksi selesai
        session()->forget(['flight_id', 'customer_id']);

        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
