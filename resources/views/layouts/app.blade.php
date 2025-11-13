<!DOCTYPE html>
<html>
    <head>
        <title>TASK LIST</title>
        @yield('styles')
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        {{--blade-formatter-disable --}}
        <style type='text/tailwindcss'>
            .btn{
                @apply cursor-pointer rounded-md px-2 py-1 text-gray-700 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-gray-100
            }
            .link{
                @apply font-medium text-gray-700 underline decoration-pink-500
            }
            label{
                @apply block uppercase text-slate-700 mb-2
            }
            input, 
            textarea{
                @apply shadow-sm appearance-none border border-slate-200 w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
            }
            .errors{
                @apply text-red-500
            }
        </style>
        {{--blade-formatter-enable --}}
    </head>

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="text-lg mb-4">@yield('title')</h1>
        <div x-data='{flash:true}' class="mt-4">
            @if (session()->has('success'))
                <div x-show='flash' class="
                    mb-10 rounded relative
                    border border-green-400 
                    bg-green-100 px-4 py-3 text-green-700 text-lg" role="alert">
                    <stroke class="font-bold">Успешно</stroke>
                    <div>{{session('success')}}</div>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width='1.5'
                            class="h-6 w-6 cursor-pointer" @click='flash=false'>
                            <path d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z" fill="green"/>
                        </svg>
                    </span>
                </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>