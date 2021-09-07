<div class="mt-5">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}">Harga Bitcoin</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('convert', ['to' => 'btc']) }}" class="nav-link {{ Route::currentRouteName() === 'convert' && Request::get('to') == 'btc' ? 'active' : '' }}">Rupiah ke Bitcoin</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('convert', ['to' => 'idr']) }}" class="nav-link {{ Route::currentRouteName() === 'convert' && Request::get('to') == 'idr' ? 'active' : '' }}">Bitcoin ke Rupiah</a>
        </li>
    </ul>
</div>
