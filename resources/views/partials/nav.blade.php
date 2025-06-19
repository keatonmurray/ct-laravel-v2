<nav class="navbar navbar-expand-md py-1">
    <div class="container-fluid px-md-5 px-0 d-flex align-items-center justify-content-between">
        <a class="ms-3 navbar-brand" href="/">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-img">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-3">
                <li class="nav-item fw-600"><a href="/" class="nav-link text-dark active">Home</a></li>
                <li class="nav-item fw-600"><a href="/your-inventory" class="nav-link text-dark">Your Inventory</a></li>
            </ul>

            <div class="actions d-flex gap-2">
                <a href="/login" class="btn btn-secondary fw-bold" role="button">
                    <i class="fa-solid fa-right-to-bracket me-1"></i>
                    Login
                </a>
                <a href="/register" class="btn btn-secondary fw-bold" role="button">
                   <i class="fa-solid fa-user-plus me-1"></i>
                    Signup
                </a>
            </div>
        </div>
    </div>
</nav>