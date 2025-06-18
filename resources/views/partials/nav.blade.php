<nav class="navbar navbar-expand-md py-1">
    <div class="container-fluid px-md-5 px-0 d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-img">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-3">
                <li class="nav-item"><a href="/" class="nav-link text-dark active">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-dark">About Us</a></li>
            </ul>

            <div class="actions d-flex gap-2">
                <button class="btn btn-secondary">Login</button>
                <button class="btn btn-primary">Signup</button>
            </div>
        </div>
    </div>
</nav>