<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <!-- <img src="{{ Storage::url('public/media/logo_poseidon.png') }}" alt="Hotel" width="40" class="me-2"> -->
            <span class="fw-bold text-primary">{{ config('app.name') }}</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @foreach($items as $key => $item)
                <a class="nav-link px-3 py-2 mx-1 @if($loop->first) active fw-semibold @endif" href="{{$key}}">
                    {{$item}}
                </a>
                @endforeach
            </div>
            <div class="navbar-nav ms-auto">
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear me-2"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2 custom-dropdown-menu">
                        <li>
                            <a class="dropdown-item py-2 px-3" href="/login">
                                <i class="fa-solid fa-user me-2 text-primary"></i> Login
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider mx-3">
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-3" href="/register">
                                <i class="fa-solid fa-user-plus me-2 text-primary"></i> Register
                            </a>
                        </li>
                    </ul>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa-solid fa-user text-primary"></i>
                            </div>
                            <span>{{$user = Auth::user()->name ?? ''}}</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2 custom-dropdown-menu">
                        <li>
                            <form class="dropdown-item" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </div>
        </div>
    </div>
</nav>