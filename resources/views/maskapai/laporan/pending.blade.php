<x-app-layout>
    <x-slot name="header" class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('maskapai.laporan.pending') }}" class="mx-3">
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
                    {{ __("List Laporan Pending") }}
                </div>
            </div>
            <a class="btn btn-active btn-neutral my-4" href="{{ route('maskapai.laporan.berhasil') }}">Laporan Berhasil</a>
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Customer</th>
                        <th>No Flight</th>
                        <th>Total Price</th>
                        <th>Total Seat</th>
                        <th>No Booking</th>
                        <th>Status</th>
                    </tr>
                </thead>

                @foreach ($transactions as $transaction)
                @if ($transaction->payment_status === 'Pending')
                    <tbody>
                        <tr class="bg-base-200">
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $transaction->customer->name }}</th>
                            <td>{{ $transaction->flight->no_flight }}</td>
                            <td>{{ $transaction->total_price }}</td>
                            <td>{{ $transaction->total_seat }}</td>
                            <td>{{ $transaction->no_booking }}</td>
                            <td>{{ $transaction->payment_status }}</td>
                            <td><form action="{{ route('maskapai.confirmPayment', ['id' => $transaction->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Konfirmasi</button>
                            </form></td>

                        </tr>
                    </tbody>
                    @endif
                @endforeach

            </table>
        </div>
    </div>
</x-app-layout>
