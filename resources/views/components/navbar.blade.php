<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ config('app.name') }}<!-- <img src="{{ Storage::url('public/media/logo_poseidon.png') }}" alt="Hotel" width="70rem"> --></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-center">
                @foreach($items as $key => $item)
                <a class="nav-link @if($loop->first)active @endif" href="{{$key}}">{{$item}}</a>
                @endforeach
            </div>
            <div class="navbar-nav ms-auto text-center">
                @guest
                <li class="nav-item dropdown me-lg-4">
                    <a class="nav-link dropdown-toggle me-lg-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear fs-5"></i> Settings
                    </a>
                    <ul class="dropdown-menu text-center text-lg-start w-25 mx-auto custom-dropdown-menu ">
                        <li><a class="dropdown-item btn btn-secondary" href="/login"><i class="fa-solid fa-user"></i> Login</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item btn btn-secondary" href="/register"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                    </ul>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown me-lg-5">
                    <a class="nav-link dropdown-toggle me-lg-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear fs-5"></i> {{$user = Auth::user()->name ?? ''}}
                    </a>
                    <ul class="dropdown-menu text-center w-25 mx-auto custom-dropdown-menu">
                        <li>
                            <form class="dropdown-item btn btn-secondary" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn w-100"><i class="fa-solid fa-lock-open"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </div>
        </div>
    </div>
</nav>