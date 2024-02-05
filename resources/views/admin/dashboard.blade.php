<x-app-layout>
    <x-slot name="header" class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('admin.airline') }}" class="mx-5">
                    Airline
                </a>
            </h2>
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __("List Account") }}
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @foreach ($users as $user)
                    <tbody>
                        <tr class="bg-base-200">
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $user->name }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td><a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit Role</a></td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>
    </div>
</x-app-layout>
