<div class="topbar" role="banner">
    <button class="toggle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="sidebar-navigation">
        <ion-icon name="menu-outline"></ion-icon>
    </button>

    <div class="topbar-text">
        <span>{{ $pageTitle ?? 'Dashboard' }}</span>
    </div>

    <div class="user" role="region" aria-label="User menu">
        <ion-icon name="person-circle-outline"></ion-icon>
        <div class="user-text">
            <span>{{ auth()->user()->name ?? 'Superadmin' }}</span>
        </div>
    </div>

    <div class="dropdown-logout" style="position: relative;">
        <button id="dropdown-icon" aria-haspopup="true" aria-expanded="false" aria-label="User options" style="background: none; border: none;">
            <ion-icon name="chevron-down-outline"></ion-icon>
        </button>

        <div class="dropdown-content" id="dropdown-content" role="menu" style="display: none; position: absolute; right: 0; background: white; border: 1px solid #ddd; padding: 10px; border-radius: 4px; z-index: 999;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                    <ion-icon name="log-out"></ion-icon>
                    <span>Logout</span>
                </button>
            </form>

            <a href="{{ url('editprofile') }}" style="display: flex; align-items: center; gap: 6px; margin-top: 10px; text-decoration: none; color: inherit;">
                <ion-icon name="pencil-outline"></ion-icon>
                <span>Edit Profile</span>
            </a>
        </div>
    </div>
</div>
