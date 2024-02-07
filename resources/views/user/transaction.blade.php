<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <form action="{{ route('user.transaction.store') }}" method="POST">
            @csrf
            <div class="form-control mt-3 flex flex-col">
                <label for="name">Name Customer : {{ $customer->name }}</label>
                <input type="hidden" class="input input-bordered w-full max-w-xs" name="customer_id" id="customer_id" value="{{ $customer->id }}">
        </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="email">Airline : {{ $flight->airline->name }}</label>
                <input type="hidden" class="input input-bordered w-full max-w-xs" name="flight_id" id="flight_id" value="{{ $flight->id }}">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="price">Price : {{ $flight->price }}</label>
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="total-seat">Total Seat</label>
                <input type="number" class="input input-bordered w-full max-w-xs" name="total_seat" id="total_seat">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="total_price">Total Price</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="total_price" id="total_price" readonly>
            </div>
            <div class="form-control mt-3 flex flex-col">
                <input type="hidden" class="input input-bordered w-full max-w-xs" name="payment_status" id="payment_status" value="Pending">
                <input type="hidden" class="input input-bordered w-full max-w-xs" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="input input-bordered w-full max-w-xs" name="airline_id" id="airline_id" value="{{ $flight->airline->id }}">
            </div>
            <div class="form-control mt-3">
                <button type="submit" class="btn btn-warning w-full max-w-xs">
                    Simpan transaksi?
                </button>
            </div>
        </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // Mendengarkan perubahan pada input total seat
                $('#total_seat').on('input', function () {
                    // Ambil nilai total seat
                    var totalSeat = $(this).val();

                    // Ambil harga penerbangan dari label
                    var flightPrice = {{ $flight->price }};

                    // Hitung total harga
                    var totalPrice = totalSeat * flightPrice;

                    // Set nilai total price pada input
                    $('#total_price').val(totalPrice.toFixed(2));
                });
            });
        </script>
</x-app-layout>
