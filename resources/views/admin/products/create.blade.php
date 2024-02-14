@extends('admin.dashboard')
@section('content')
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <h2 class="mt-4 text-center text-3xl font-bold tracking-tight text-gray-900">Create A Product</h2>
                </div>
                <form class="space-y-6" action="/admin/dashboard/manage_products/create" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 mb-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <input id="description" name="description" type="text" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{old("description")}}">
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1">
                            <input id="price" name="price" type="text" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{old("price")}}">
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <label for="stockQuantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                        <div class="mt-1">
                            <input id="stockQuantity" name="stockQuantity" type="text" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{old("stockQuantity")}}">
                            @error('stockQuanity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                        <div class="mt-1">
                            <input id="rating" name="rating" type="text" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{old("rating")}}">
                            @error('rating')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
                        <select id="categories" name="categories[]"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                            multiple>
                        </select>
                        <input type="hidden" name="category_texts" id="category_texts" value="">
                        @error('categories')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div
                        class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 mt-3 mb-5 px-6 pt-5 pb-6">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-red-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a Image Product </span>
                                    <input id="file-upload" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                        </div>
                    </div>
                    <div class="mt-4 flex gap-3">
                        <button type="submit"
                            class="flex  justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none ">Create
                        </button>
                        <button type="button">
                            <a href="/admin/dashboard/manage_products" class="hover:underline">Cancel</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#categories").select2({
                ajax: {
                    url: '/admin/dashboard/manage_products/categories',
                    dataType: 'json',
                    data: function(params) {
                        console.log(params)
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(category) {
                                return {
                                    id: category.id,
                                    text: category.text
                                };
                            })
                        };
                    },
                    cache: true
                }
            })
            $("#categories").on("select2:select select2:unselect", function(e) {
                var selectedCategories = $(this).select2('data');
                var categoryTexts = selectedCategories.map(function(category) {
                    return category.text;
                }).join(',');
                $("#category_texts").val(categoryTexts);
            });
        })
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
