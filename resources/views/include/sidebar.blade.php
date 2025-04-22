<style>
    .navigation {
        max-height: 100vh;
        overflow-y: auto;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .navigation::-webkit-scrollbar {
        display: none;
    }
</style>


<nav class="navigation" id="sidebar-navigation" role="navigation" aria-label="Main navigation">
    <ul>
        <li>
            <a href="#" aria-label="Home">
                <span class="icon">
                    <img src="{{ asset('images/LOGO_FIX.png') }}" alt="Logo Kota Bogor" width="150">
                </span>
            </a>
        </li>

        <li>
            <a href="dashboard">
                <span class="icon">
                    <ion-icon name="speedometer"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="agenda">
                <span class="icon">
                    <ion-icon name="calendar"></ion-icon>
                </span>
                <span class="title">Agenda</span>
            </a>
        </li>

        <li>
            <a href="new">
                <span class="icon">
                    <ion-icon name="add-circle"></ion-icon>
                </span>
                <span class="title">New</span>
            </a>
        </li>

        <li>
            <a href="draft">
                <span class="icon">
                    <ion-icon name="pencil"></ion-icon>
                </span>
                <span class="title">Draft</span>
            </a>
        </li>

        <li>
            <a href="tentative">
                <span class="icon">
                    <ion-icon name="help-circle"></ion-icon>
                </span>
                <span class="title">Tentative</span>
            </a>
        </li>

        <li>
            <a href="confirm">
                <span class="icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                </span>
                <span class="title">Confirm</span>
            </a>
        </li>

        <li>
            <a href="cancel">
                <span class="icon">
                    <ion-icon name="close-circle"></ion-icon>
                </span>
                <span class="title">Cancel</span>
            </a>
        </li>

        <li>
            <a href="laporan">
                <span class="icon">
                    <ion-icon name="document-text"></ion-icon>
                </span>
                <span class="title">Laporan</span>
            </a>
        </li>

        @auth
        @if (auth()->user()->type === 'Superadmin' || auth()->user()->type === 'superadmin' || auth()->user()->type === 'Admin')
            <li>
                <a href="{{ route('user') }}">
                    <span class="icon">
                        <ion-icon name="person-circle"></ion-icon>
                    </span>
                    <span class="title">User</span>
                </a>
            </li>
        @endif
    @endauth

        <li>
            <a href="settings">
                <span class="icon">
                    <ion-icon name="settings"></ion-icon>
                </span>
                <span class="title">Settings</span>
            </a>
        </li>
    </ul>
</nav>
