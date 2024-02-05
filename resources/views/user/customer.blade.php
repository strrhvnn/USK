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
        <form action="{{ route('user.customer.store', $flight->id) }}" method="POST">
            @csrf
            <div class="form-control mt-3 flex flex-col">
                <label for="name">Name</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="name" id="name">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="email">Email</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="email" id="email">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="phone_number" id="phone_number">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <label for="address">Address</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="address" id="address">
            </div>
            <div class="form-control mt-3 flex flex-col">
                <input type="hidden" class="input input-bordered w-full max-w-xs" name="user_id" id="user_id" value="{{ auth()->user()->id }}" readonly>
            </div>
            <div class="form-control mt-3">
                <button type="submit" class="btn btn-warning w-full max-w-xs">
                    Simpan dan lanjutkan pembayaran?
                </button>
            </div>
        </form>
        </div>

</x-app-layout>
