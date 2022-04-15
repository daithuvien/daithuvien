<header class="header header--layout-1">

  <!-- Header Top Bar -->
  <div class="header__top-bar clearfix">
    <div class="container">
      <div class="header__top-bar-inner">

        <!-- Account Navigation -->
        <ul class="nav-account">
          <li class="nav-account__item"><a href="#">Ngôn Ngữ: <span class="highlight">VI</span></a>
            <ul class="main-nav__sub">
              <li><a href="#">English</a></li>
            </ul>
          </li>
          @guest
            <li class="nav-account__item"><a href="#" data-toggle="modal" data-target="#modal-login-register"><i class="icons icon-login"></i>  Đăng Ký/Đăng Nhập</a></li>
          @endguest
          
          @auth
          <li class="nav-account__item"><a href="#"><i class="icons icon-user"></i> Tài Khoản</a>
            <ul class="main-nav__sub">
              <li><a href="#">Thông Tin</a></li>
            </ul>
          </li>    
          <li class="nav-account__item nav-account__item--logout">
            <a href="{{ route('logout') }}"><i class="icons icon-logout"></i> Đăng Xuất</a>
            {{-- <form id="logout-form" action="#" method="POST" class="d-none">@csrf</form> --}}
          </li>
          @endauth
          
        </ul>
        <!-- Account Navigation / End -->

      </div>
    </div>
  </div>
  <!-- Header Top Bar / End -->

  <!-- Header Secondary -->
  <div class="header__secondary">
    <div class="container">

      <!-- Header Search Form -->
      <div class="header-search-form">
        <form action="#" id="mobile-search-form" class="search-form">
          <input type="text" class="form-control header-mobile__search-control" value="" placeholder="Tìm kiếm...">
          <button type="submit" class="header-mobile__search-submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
      <!-- Header Search Form / End -->
      <ul class="info-block info-block--header">
      </ul>
    </div>
  </div>
  <!-- Header Secondary / End -->

  <!-- Header Primary -->
  <div class="header__primary">
    <div class="container">
      <div class="header__primary-inner">
        <!-- Header Logo -->
        <div class="header-logo">
          <a href="/"><img src="{{ asset('client/images/logo.png')}}" alt="Alchemists"
              srcset="{{ asset('client/images/logo@2x.png 2x')}}" class="header-logo__img"></a>
        </div>
        <!-- Header Logo / End -->

        <!-- Main Navigation -->
        <nav class="main-nav clearfix">
          <ul class="main-nav__list">
            <li class="@if($controller=='HomeController' && $action=='index')active @endif"><a href="/">Trang Chủ</a></li>
            <li class="@if($controller=='CoursesController')active @endif"><a href="/khoa-hoc">Khóa Học</a>
              <ul class="main-nav__sub">
                <li><a href="/khoa-hoc/danh-muc/web-development">Web Development</a></li>
                <li><a href="/khoa-hoc/danh-muc/mobile-development">Mobile Development</a></li>
                <li><a href="/khoa-hoc/danh-muc/devops">DevOps</a></li>
              </ul>
            </li>
            <li class="@if($controller=='MoviesController')active @endif"><a href="#">Phim Ảnh</a></li>
            <li class=""><a href="#">Game</a></li>
            <li class=""><a href="#">Truyện Chữ</a></li>
            <li class=""><a href="#">Truyện Tranh</a></li>
          </ul>
        </nav>
        <!-- Main Navigation / End -->
      </div>
    </div>
  </div>
  <!-- Header Primary / End -->
</header>