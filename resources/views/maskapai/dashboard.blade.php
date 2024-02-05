<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('maskapai.flight.add') }}" class="mx-5">
                Add Flight
            </a>
            <a href="{{ route('maskapai.laporan.pending') }}">
                Laporan
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
                                <a href="{{ route('maskapai.flight.edit', ['id' => $flight->id]) }}" class="btn btn-warning my-3">Edit</a>
                                <form action="{{ route('maskapai.flight.delete', ['id' => $flight->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this flight?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>
    </div>
</x-app-layout>
