<header>
    <nav class="
        navbar
        bg-primary
        shadow
        px-5
        d-flex flex-column flex-nowrap justify-content-between
        flex-sm-row
    ">

        <a class="navbar-brand text-white me-4 p-0" href="{{ route('spaceships.index') }}">
            <b>Spaceship</b> <span class="fs-6">ManagementPlatform</span>
        </a>

        <div class="d-flex align-items-center justify-content-center flex-wrap">
            <span class="text-white me-1">
                {{ Auth::user()->name }}
            </span>

            <div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input
                        type="submit"
                        class="btn text-white py-0 fw-bold"
                        value="{{ __('Logout') }}"
                    />
                </form>
            </div>
        </div>

    </nav>
</header>
