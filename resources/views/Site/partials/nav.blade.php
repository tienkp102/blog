<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Stories<span>.</span></a>
        <img src="{{ isset($information['logo']) ? asset('/admin/upload/' . $information['logo']) : '' }}" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Trang Chủ</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">Về Chúng Tôi</a></li>
                <li class="nav-item"><a href="{{ route('product') }}" class="nav-link">Thực Đơn</a></li>
                <li class="nav-item"><a href="{{ route('news') }}" class="nav-link">Tin Tức</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Liên Hệ</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->