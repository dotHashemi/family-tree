<section id="sidebar">
    <div class="text-light pt-4 pb-3 px-4 text-center bg-secondary">
        <h3>
            شجره‌نامه
        </h3>
    </div>

    <ul class="nav nav-pills flex-column mb-auto text-white">
        <li class="nav-item">
            <a href="{{ route('panel.index') }}" class="nav-link {{ preg_match('#^panel.index.*#', Route::current()->getName()) ? 'active' : '' }}" aria-current="page">
                <i class="gg-board"></i>
                پیشخان
            </a>
        </li>
        <li>
            <a href="{{ route('panel.cities.index') }}" class="nav-link {{ preg_match('#^panel.cities.*#', Route::current()->getName()) ? 'active' : '' }}">
                <i class="gg-attribution"></i>
                شهرها
            </a>
        </li>
        <li>
            <a href="{{ route('panel.people.index') }}" class="nav-link {{ preg_match('#^panel.people.*#', Route::current()->getName()) ? 'active' : '' }}">
                <i class="gg-user"></i>
                شخص‌ها
            </a>
        </li>
        <li>
            <a href="{{ route('panel.couples.index') }}" class="nav-link {{ preg_match('#^panel.couples.*#', Route::current()->getName()) ? 'active' : '' }}">
                <i class="gg-heart"></i>
                ازدواج‌ها
            </a>
        </li>
    </ul>
</section>