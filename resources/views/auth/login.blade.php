<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Dospiration · Asweek</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body class="text-center">

    <main class="form-signin">
        <div class="card">
            <div class="card-body">
                <form action="/login" method="post">
                    @csrf
                    <img class="mb-4" src="{{ asset('img/trisakti_logo.png') }}" alt="TSM Logo" height="87">
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                    @if (session('error'))
                        <div class="alert alert-danger">
                        {{ session('error') }}
                        </div>
                    @endif
                    @if (session('no_access'))
                        <div class="alert alert-danger">
                        {{ session('no_access') }}
                        </div>
                    @endif
        
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="floatingInput" placeholder="name@example.com" autofocus required value="{{ old('username') }}">
                        <label for="floatingInput">Username</label>
                        @error('usernae')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Sign in</button>
                </form>
                <p class="mt-5 text-muted"><strong>&copy; BPM TSM. All Rights Reserved.</strong>
                    <small class="text-muted">Powered by <a href="https://portfolio.synodev.my.id" target="_blank" rel="noopener noreferrer">Synodev</a></small>
                </p>
            </div>
        </div>
    </main>
    
</body>
</html>