@extends('admin.layouts.layout')
@section('content')
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <h2 class="mt-4 text-center text-3xl font-bold tracking-tight text-gray-900">Create A Category</h2>
                </div>
                <form class="space-y-6" action="/admin/dashboard/manage_categories/create" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Categoires in your
                            database</label>
                        <div class="mt-1">
                            <ul>
                                @foreach ($categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>





                    <div class="mt-4 flex gap-3">
                        <button type="submit"
                            class="flex  justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none ">Create
                        </button>
                        <button type="button">
                            <a href="/admin/dashboard/manage_categories" class="hover:underline">Cancel</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
