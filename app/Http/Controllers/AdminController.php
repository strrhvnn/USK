<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\transaction;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $users = User::find($id);
        return view('admin.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => ['required', 'in:admin,user,maskapai'],
        ]);

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->role = $request->input('role');

        $users->save();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function laporan()
    {
        $transactions = transaction::all();
        return view('maskapai.laporan.pending', compact('transactions'));
    }

    public function laporanBerhasil(){
        $transactions = transaction::all();
        return view('maskapai.laporan.berhasil', compact('transactions'));
    }

    public function confirmPayment($id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            // Update status pembayaran menjadi 'Berhasil'
            $transaction->payment_status = 'Berhasil';
            $transaction->save();

            // Kurangi seat_availability pada penerbangan
            $flight = $transaction->flight;
            $flight->seat_availability -= $transaction->total_seat;
            $flight->save();
        }

        // Redirect atau tampilkan pesan berhasil konfirmasi
        return redirect()->route('maskapai.laporan.pending')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
