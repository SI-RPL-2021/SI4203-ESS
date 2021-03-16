<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;800&family=Red+Hat+Text:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Smart Parking</title>
</head>

<body style="background-color: #E7EFF6;" id="home">

    <!-- navbar -->
    <header>
        <nav class="navbar navbar-expand navbar-dark shadow p-3 mb-5" style="background-color: #2A4D69;">
            <div class="nav-item">
                <span class="navbar-brand ">E-SS</span>
            </div>
            <div class=" navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#home">Awal </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Hubungi </a>
                </li>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="dropdown">
                    <a class="btn rounded-pill align-middle shadow-sm" href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false" style="background-color: #63ACE5;">
                        <span class="txt-button" style="color: white;">Login</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- penutup navbar -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>