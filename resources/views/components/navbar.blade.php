{{-- Component Navbar --}}

<nav class="navbar group">
    <ul>
        <li class="navbar-item"><a href="{{ route('accueil') }}">Accueil</a></li>
        <li class="navbar-item"><a href="{{ route('ouvrages.index') }}">Ouvrages</a></li>
        <li class="navbar-item"><a href="{{ route('auteurs.index') }}">Auteurs</a></li>
        <li class="navbar-item"><a href="{{ route('editeurs.index') }}">Editeurs</a></li>
        <li class="navbar-item"><a href="{{ route('reservations.index') }}">Réservations</a></li>
    </ul>
</nav>
