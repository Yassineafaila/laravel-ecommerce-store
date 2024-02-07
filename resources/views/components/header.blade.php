<!-- Header -->
<header class="mx-auto flex h-16 max-w-[1200px] items-center justify-between px-5 py-1.5">
    <a href="/" class="text-black font-bold md:text-2xl text-base">
        ElectroDev
    </a>

    <div class="md:hidden">
        <button id="mobileMenuBtnOpen">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <form class="hidden h-9 w-2/5 items-center border md:flex">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="mx-3 h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>

        <input class="hidden w-11/12 outline-none md:block" type="search" placeholder="Search" />

        <button class="ml-auto h-full bg-amber-400 px-4 hover:bg-yellow-300">
            Search
        </button>
    </form>

    <div class="hidden gap-3 md:!flex">
        <a href="wishlist.html" class="flex cursor-pointer flex-col items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>

            <p class="text-xs">Wishlist</p>
        </a>

        @auth
            <a href="cart.html" class="flex cursor-pointer flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                    <path fill-rule="evenodd"
                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                        clip-rule="evenodd" />
                </svg>

                <p class="text-xs">Cart</p>
            </a>

            <a href="account-page.html" class="relative flex cursor-pointer flex-col items-center justify-center">
                <span class="absolute bottom-[33px] right-1 flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-red-500"></span>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

                <p class="text-xs">Account</p>
            </a>
        @endauth
    </div>
</header>
<!-- /Header -->

<!-- Burger menu  -->
<section id="mobileMenu" class="hidden absolute left-0 right-0 z-50 h-full w-full bg-white md:hidden">
    <div class="mx-auto">
        <div class="mx-auto flex w-full justify-center gap-3 py-4">
            <a href="wishlist.html" class="flex cursor-pointer flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>

                <p class="text-xs">Wishlist</p>
            </a>

            @auth
                <a href="cart.html" class="flex cursor-pointer flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                            clip-rule="evenodd" />
                    </svg>

                    <p class="text-xs">Cart</p>
                </a>

                <a href="account-page.html" class="relative flex cursor-pointer flex-col items-center justify-center">
                    <span class="absolute bottom-[33px] right-1 flex h-2 w-2">
                        <span
                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-red-500"></span>
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <p class="text-xs">Account</p>
                </a>
            @endauth
        </div>

        <form class="my-4 mx-5 flex h-9 items-center border">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mx-3 h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>

            <input class="hidden w-11/12 outline-none md:block" type="search" placeholder="Search" />

            <button type="submit" class="ml-auto h-full bg-amber-400 px-4 hover:bg-yellow-300">
                Search
            </button>
        </form>
        <ul class="text-center font-medium">
            <li class="py-2"><a href="index.html">Home</a></li>
            <li class="py-2 md:hidden"><a href="catalog.html">Catalog</a></li>
            <li class="py-2"><a href="about-us.html">About Us</a></li>
            <li class="py-2"><a href="contact-us.html">Contact Us</a></li>
            @auth
                <div></div>
            @else
                <li class="py-2"><a href="/login">Login</a></li>
                <li class="py-2"><a href="/register">Sign up</a></li>
            @endauth
        </ul>
    </div>
</section>
<!-- /Burger menu  -->

<!-- Nav bar -->
<!-- hidden on small devices -->

<nav class="relative bg-red-500">
    <div class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex ">
        <button id="desktopMenuBtn"
            class="ml-5 flex h-full lg:w-52 md:w-48 cursor-pointer items-center justify-center bg-amber-400 relative">
            <div class="flex justify-around items-center " id="categoryDropdown">
                <div class="w-full flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mx-1 h-6 w-6 show">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <i class="fa-solid fa-xmark text-xl hidden close me-2"></i>

                    All categories
                </div>

                <!-- Categories Dropdown -->
                <div id="categoriesDropdown" class="hidden  absolute top-full w-full bg-white shadow-md  py-1  z-10">
                    @foreach ($categories as $category)
                        <a href="#"
                            class="block text-start px-4 py-2 text-sm text-gray-700 hover:bg-red-200">{{ $category->name }}</a>
                    @endforeach
                </div>
                <!-- /Categories Dropdown -->
            </div>

        </button>

        <div class="mx-7 flex gap-8">
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="index.html">Home</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline md:hidden"
                href="catalog.html">Catalog</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="about-us.html">About Us</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="contact-us.html">Contact Us</a>
        </div>

        @auth
            <div class="ml-auto flex gap-4 px-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        @else
            <div class="ml-auto flex gap-4 px-5">
                <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline" data-remote="true"
                    href="/login">Login</a>

                <span class="text-white">&#124;</span>

                <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline" href="/register"
                    data-remote="true">Sign
                    Up</a>
            </div>
        @endauth
    </div>
</nav>
<!-- /Nav bar -->
<script>
    $(document).ready(function() {
        // Toggle category dropdown
        $('#categoryDropdown').click(function() {
            $('#categoriesDropdown').toggleClass('hidden');
            $(".close").toggle()
            $(".show").toggle()
        });
        // Toggle mobile menu
        $('#mobileMenuBtnOpen').click(function() {
            $('#mobileMenu').toggleClass("hidden block")
        });

    });;
</script>
