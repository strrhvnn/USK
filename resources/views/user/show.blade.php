<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('user.dashboard') }}" class="mx-5">
                Dashboard
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Maskapai</th>
                                    <th>No Flight</th>
                                    <th>Total Price</th>
                                    <th>No Booking</th>
                                    <th>Departure City</th>
                                    <th>Arrival City</th>
                                    <th>Total Seat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            @foreach ($transactions as $transaction)
                                <tbody>
                                    <tr class="bg-base-200">
                                        <th>{{ $loop->iteration }}</th>

                                        @if ($transaction->customer)
                                            <th>{{ $transaction->customer->name }}</th>
                                            <th>{{ $transaction->flight->airline->name }}</th>
                                            <td>{{ $transaction->flight->no_flight }}</td>
                                            <td>{{ $transaction->total_price }}</td>
                                            <td>{{ $transaction->no_booking }}</td>
                                            <td>{{ $transaction->flight->departure_city }}</td>
                                            <td>{{ $transaction->flight->arrival_city }}</td>
                                            <td>{{ $transaction->total_seat }}</td>
                                            <td>{{ $transaction->payment_status }}</td>
                                        @else
                                            <td colspan="7">You don't have a valid ticket</td>
                                        @endif

                                    </tr>
                                </tbody>
                            @endforeach



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
