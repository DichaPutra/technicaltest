<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Technical Test Dicha Putra Arwindra</title>

        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- fontawsome kit CDN -->
        <script src="https://kit.fontawesome.com/39ba0aa9d2.js" crossorigin="anonymous"></script>

        <!--jquery CDN-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!--datatable css-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    pageLength: 5,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
                });
            });
        </script>

    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
            <div class="container-xl">
                <a class="navbar-brand" href="{{ route('login') }}">TechnicalTest</a>
                <div class="pull-right">
                    <button class="navbar-toggler pull-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbars">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @else

                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" aria-disabled="true">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('logout') }}" tabindex="-1" >Logout</a>
                            </li>
                            <!--
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>-->
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('body')
        </main>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>