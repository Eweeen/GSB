<nav>
    <i class='bx bx-menu'></i>
    <a href="{{ route('home') }}" draggable="false"><img src="{{ asset('img/gsb.png') }}" alt="Logo GSB" class="img-nav" draggable="false"></a>
</nav>

<ul class="nav-list">
    <a href="{{ route('home') }}" class="nav-item {{Route::getCurrentRoute()->uri() == '/' ? 'active-link' : '' }}" draggable="false">
        <li><i class='bx bx-home'></i> Home</li>
    </a>
    @auth
        <li class="nav-item {{Route::getCurrentRoute()->uri() == 'profil' ? 'active-link' : '' }}">
            <span class="link-profil">
                <span>
                    <i class='bx bx-user'></i>
                    {{ auth()->user()->VIS_NOM }}
                </span>
                <i class='bx bx-chevron-down'></i>
            </span>
            <ul class="nav-profil-list">
                <a href="/profil" class="nav-profil-item" draggable="false">
                    <li>Profil <i class='bx bxs-user-badge'></i></li>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{-- route('logout') --}}" class="nav-profil-item" onclick="event.preventDefault(); this.closest('form').submit();" draggable="false">
                        <li class="logout">Deconnexion <i class='bx bx-log-out'></i></li>
                    </a>
                    <!-- <button type="submit">Deconnexion</button> -->
                </form>
            </ul>
        </li>
    @else
        <a href="{{ route('login') }}" class="nav-item" draggable="false">
            <li><i class='bx bx-log-in'></i> Connexion</li>
        </a>
    @endauth
    <a href="/comptes-rendus" class="nav-item {{Route::getCurrentRoute()->uri() == 'comptes-rendus' ? 'active-link' : '' }}" draggable="false">
        <li><i class='bx bxs-file'></i> Comptes rendus</li>
    </a>
    <a href="/praticiens" class="nav-item {{Route::getCurrentRoute()->uri() == 'praticiens' ? 'active-link' : '' }}" draggable="false">
        <li><i class='bx bxs-contact'></i> Praticiens</li>
    </a>
</ul>