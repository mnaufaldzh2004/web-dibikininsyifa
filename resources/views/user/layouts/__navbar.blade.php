 {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">dibikin<span>InSyifa</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#cara-kerja">Cara Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#Ilustrator">Ilustrator</a></li>
                    
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-pink btn-sm" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
