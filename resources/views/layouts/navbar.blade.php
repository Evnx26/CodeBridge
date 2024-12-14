<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">x
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/codebridge-removebg-preview.png') }}" alt="Logo CodeBridge" width="80"
                height="80">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">Course</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                @if (!Auth::check())
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Sign Up</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                @else
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">Sign Out</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
