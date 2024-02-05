<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __("Edit Account") }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form action="{{ route('admin.update',$users->id) }}" method="POST">
        @csrf
        <div class="form-control mt-3">
            <label for="name">Name</label>
            <input type="text" class="input input-bordered w-full max-w-xs" name="name" id="name" value="{{ $users->name }}">
        </div>
        <div class="form-control mt-3">
            <label for="email">Email</label>
            <input type="text" class="input input-bordered w-full max-w-xs" name="email" id="email" value="{{ $users->email }}">
        </div>
        <div class="form-control mt-3">
            <label for="role">Role</label>
            <select class="select select-bordered w-full max-w-xs" name="role" id="role" >
                <option disabled selected>Choose Role</option>
                <option>admin</option>
                <option>user</option>
                <option>maskapai</option>
              </select>
        </div>
        <div class="form-control mt-3">
            <button type="submit" class="btn btn-warning w-full max-w-xs">
                Simpan
            </button>
        </div>
    </form>
    </div>
</x-app-layout>
