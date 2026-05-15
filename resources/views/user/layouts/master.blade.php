@include('user.layouts.__header')

<body>



    @include('user.layouts.__navbar')

    {{-- Konten halaman --}}
    <main>
        @yield('content')
       
    </main>


    @include('user.layouts.__footer')
    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="{{ env('APP_URL') }}/user/js/animation.js"></script>
     <script src="{{ env('APP_URL') }}/user/js/main.js"></script>
    @yield('scripts')
    
    
</body>

</html>