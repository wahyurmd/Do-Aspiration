<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Dospiration</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Css Tambahan -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pb-3" aria-label="Fifth navbar example">
        <div class="container-fluid ps-3 pe-3">
            <a class="navbar-brand" href="#"><strong>Dospiration</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (auth()->user()->level == 'Admin')    
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/data-user') }}">Data User</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/mhs/dashboard') }}">Home</a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="bi bi-box-arrow-right"></i> Log out
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End: Navbar Menu -->

    <!-- Aspiration Week -->
    <section id="background-dash">
        <div class="px-4 text-center">
            <h1 class="display-3 fw-bold font-color"><strong>ASPIRATION WEEK</strong></h1>
            <h2 class="display-4 fw-bold font-color"><strong>DO-SPIRATION</strong></h2>
            <h4 class="font-quote">&#8223;SPEAK YOUR VOICE TO BRING A BETTER FUTURE&#8223;</h4>
            <div class="col-lg-6 mx-auto pt-4">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    @if (auth()->user()->level == 'Mahasiswa')    
                    <button type="button" class="btn btn-primary btn-md px-4 gap-3" data-bs-toggle="modal" data-bs-target="#addtModal">
                        <i class="bi bi-plus"></i> Add Aspiration
                    </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid pt-2">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                @foreach ($aspiration as $data)
                    <div class="col">
                        <div class="p-2">
                            <div class="card">
                                <textarea name="aspiration" class="form-control" rows="10" readonly>{{ $data->aspiration }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center pt-3">
                {{ $aspiration->onEachSide(5)->links() }}
            </div>
        </div>
    </section>
    <!-- End: Aspiration Week -->

    <!-- Modal Add Aspiration -->
    <div class="modal modal-signin py-5" tabindex="-1" role="dialog" id="addtModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->
                <h3 class="fw-bold mb-0">Add Your Aspiration</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="/mhs/dashboard" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <textarea name="aspiration" class="form-control rounded-4" id="floatingInput" rows="10" required></textarea>
                        <input type="hidden" name="username" class="form-control rounded-4" id="floatingInput" value="{{ auth()->user()->username }}" autofocus>
                        <label for="floatingInput">Give Your Aspirations Here...</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-md rounded-4 btn-primary" type="submit">Add</button>
                    <small class="text-muted">By clicking Add, you agree to express your aspirations.</small>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- End: Modal Add Aspiration -->

    <!-- Modal Log out -->
    <div class="modal modal-alert py-5" tabindex="-1" role="dialog" id="logoutModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/logout" method="post">
                @csrf
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Are you sure?</h5>
                        @if (auth()->user()->level == 'Mahasiswa')
                            <p class="mb-0">You can't fill aspiration if you leave.</p>
                        @endif
                    </div>
                    <div class="modal-footer flex-nowrap p-0">
                        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>Yes, sure</strong></button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End: Modal Log out -->

    <!-- Script JS Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>