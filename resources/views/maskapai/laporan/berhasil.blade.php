<x-app-layout>
    <x-slot name="header" class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('maskapai.laporan.pending') }}">
                    Laporan
                </a>
                <a href="{{ route('maskapai.dashboard') }}">
                    Flight
                </a>
            </h2>
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __('List Laporan Berhasil') }}
                </div>
            <form action="{{ route('maskapai.searchLaporan') }}" method="GET">
                <input type="text" name="departure_city" class="input input-bordered input-neutral w-full max-w-xs mx-3" placeholder="Search by Departure City" />
                <button type="submit" class="btn btn-active btn-neutral my-4">Cari</button>
            </form>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            @php
                $totalIncome = 0; // Initialize the total income variable
            @endphp
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Customer</th>
                        <th>Nama Maskapai</th>
                        <th>No Flight</th>
                        <th>Total Price</th>
                        <th>Total Seat</th>
                        <th>Departure City</th>
                        <th>Arrival City</th>
                        <th>No Booking</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach ($transactions as $transaction)
                    @if ($transaction->payment_status === 'Berhasil')
                        <tbody>
                            <tr class="bg-base-200">
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $transaction->customer->name }}</th>
                                <th>{{ $transaction->flight->airline->name }}</th>
                                <td>{{ $transaction->flight->no_flight }}</td>
                                <td>{{ $transaction->total_price }}</td>
                                <td>{{ $transaction->total_seat }}</td>
                                <td>{{ $transaction->flight->departure_city }}</td>
                                <td>{{ $transaction->flight->arrival_city }}</td>
                                <td>{{ $transaction->no_booking }}</td>
                                <td>{{ $transaction->payment_status }}</td>
                            </tr>
                        </tbody>
                        @php
                        if ($transaction->payment_status == 'Berhasil') {
                            $totalIncome += $transaction->total_price;
                        }else {
                            $totalIncome = 'Transaksi belum ada yang di konfirmasi';
                        }
                        @endphp
                    @endif
                @endforeach

            </table>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __('Jumlah Total Pemasukan') }} =     {{ $totalIncome }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
