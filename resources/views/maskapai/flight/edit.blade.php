<x-app-layout>
    <x-slot name="header" class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
                    {{ __("Fligth Schedule") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <form action="{{ route('maskapai.flight.update',$flight->id) }}" method="POST">
            @csrf
            <div class="form-control mt-3 flex flex-col">
                <label for="name">Id Airlines</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="airline_id" id="airline_id" value="{{ auth()->user()->id }}" readonly>
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="no_flight">No Flight</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="no_flight" id="no_flight" value="{{ $flight->no_flight }}">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="departure_city">Departure City</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="departure_city" id="departure_city" value="{{ $flight->departure_city }}">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="departure_city">Departure Date</label>
                <input type="Date" class="input input-bordered w-full max-w-xs" name="departure_date" id="departure_date" value="{{ $flight->departure_date }}">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="departure_time">Departure Time</label>
                <input type="time" class="input input-bordered w-full max-w-xs" name="departure_time" id="departure_time" value="{{ $flight->departure_time }}">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="arrival_city">Arrival City</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="arrival_city" id="arrival_city" value="{{ $flight->arrival_city }}">
            </div>
            <div class="form-control mt-3">
                <label for="arrival_time">Arrival Time</label>
                <input type="time" class="input input-bordered w-full max-w-xs" name="arrival_time" id="arrival_time" value="{{ $flight->arrival_time}}">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="departure_city">Arrival Date</label>
                <input type="Date" class="input input-bordered w-full max-w-xs" name="arrival_date" id="arrival_date" value="{{ $flight->arrival_date }}">
            </div>
            <div class="form-control mt-3">
                <label for="seat_availability">Seat Available</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="seat_availability" id="seat_availability" value="{{ $flight->seat_availability }}"> <!-- Sesuaikan dengan nama field di controller -->
            </div>
            <div class="form-control mt-3">
                <label for="price">Price</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="price" id="price" value="{{ $flight->price }}">
            </div>
            <div class="form-control mt-3">
                <button type="submit" class="btn btn-warning w-full max-w-xs">
                    Simpan
                </button>
            </div>
        </form>
        </div>
</x-app-layout>
