<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('user.show') }}" class="mx-5">
                My Tiket
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
            <form action="{{ route('user.searchFlights') }}" method="GET">
                <input type="text" name="departure_city" class="input input-bordered input-neutral w-full max-w-xs mx-3" placeholder="Search by Departure City" />
                <button type="submit" class="btn btn-active btn-neutral my-4">Cari</button>
            </form>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name Airline</th>
                        <th>No Flight</th>
                        <th>Departure City</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Arrival City</th>
                        <th>Arrival Date</th>
                        <th>Arrival Time</th>
                        <th>Seat Available</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @foreach ($flights as $flight)
                    <tbody>
                        <tr class="bg-base-200">
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $flight->airline->name }}</th>
                            <td>{{ $flight->no_flight }}</td>
                            <td>{{ $flight->departure_city }}</td>
                            <td>{{ $flight->departure_date }}</td>
                            <td>{{ $flight->departure_time }}</td>
                            <td>{{ $flight->arrival_city }}</td>
                            <td>{{ $flight->arrival_date }}</td>
                            <td>{{ $flight->arrival_time }}</td>
                            <td>{{ $flight->seat_availability }}</td>
                            <td>{{ $flight->price }}</td>
                            <td>
                                <a href="{{ route('user.customer', ['id' => $flight->id]) }}" class="btn btn-success my-3">Buy</a>
                            </td>

                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>
    </div>
</x-app-layout>
