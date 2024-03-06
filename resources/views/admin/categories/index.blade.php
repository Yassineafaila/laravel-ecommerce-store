@extends('admin.layouts.layout')
@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Categories</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the Categories in your store </p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <a href="/admin/dashboard/manage_categories/create"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none  sm:w-auto">Add
                    Category</a>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-red-500 bg-opacity-90  ">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">Id
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                        Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                                @foreach ($categories as $category)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $category->id }}</td>


                                        <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                            {{ $category->name }}
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-4 px-3 text-center text-sm font-medium sm:pr-6 ">
                                            <a href="/admin/dashboard/manage_categories/{{ $category->id }}/edit"
                                                class="text-red-500 me-2 hover:underline">Edit
                                            </a>
                                            <form method="post"
                                                action="/admin/dashboard/manage_categories/{{ $category->id }}/delete"
                                                class="inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="bg-gray-400 px-2 py-1.5 rounded-md hover:bg-gray-900 hover:text-white">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
