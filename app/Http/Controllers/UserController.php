<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();
        return view('user.dashboard', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $flight = Flight::find($id);
        return view('user.customer', compact('flight'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $flightId)
    {
        $customer = Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'user_id' => $request->input('user_id'),
            // tambahkan kolom lainnya
        ]);

        // Simpan ID customer dan flight ke dalam session
        session(['customer_id' => $customer->id, 'flight_id' => $flightId]);

        return redirect()->route('user.transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Mengambil pengguna yang sedang login
        $user = auth()->user();

        // Memeriksa apakah pengguna memiliki data customer terkait
        if ($user) {
            // Mengambil semua transaksi yang terkait dengan user melalui relasi Eloquent
            $transactions = Transaction::where('user_id', $user->id)->get();
        } else {
            // Jika tidak ada data customer atau pengguna tidak login, atasi dengan memberikan nilai koleksi kosong
            $transactions = collect(); // atau nilai default lainnya
        }

        // Mengirimkan data transaksi dan data customer ke halaman tampilan
        return view('user.show', compact('transactions', 'user'));
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
}
