<header class="header header--layout-1">

  <!-- Header Top Bar -->
  <div class="header__top-bar clearfix">
    <div class="container">
      <div class="header__top-bar-inner">

        <!-- Account Navigation -->
        <ul class="nav-account">
          <li class="nav-account__item">
            @if(\Illuminate\Support\Facades\Session::get('language') == null || \Illuminate\Support\Facades\Session::get('language') == 'vi')
              <a href="#">{{ __('message.menu.language') }}: <span class="highlight">VI</span></a>
              <ul class="main-nav__sub">
                <li><a href="{{ route('change_locale',['en']) }}">English</a></li>
              </ul>
            @else
              <a href="#">{{ __('message.menu.language') }}: <span class="highlight">EN</span></a>
              <ul class="main-nav__sub">
                <li><a href="{{ route('change_locale',['vi']) }}">Tiếng Việt</a></li>
              </ul>
            @endif
          </li>
          @guest
            <li class="nav-account__item"><a href="#" data-toggle="modal" data-target="#modal-login-register"><i class="icons icon-login"></i>  {{ __('message.menu.register') }}/{{ __('message.menu.login') }}</a></li>
          @endguest
          
          @auth
          <li class="nav-account__item"><a href="#"><i class="icons icon-user"></i> {{ __('message.menu.info') }}</a>
            <ul class="main-nav__sub">
              <li><a href="#">{{ __('message.menu.profile') }}</a></li>
            </ul>
          </li>    
          <li class="nav-account__item nav-account__item--logout">
            <a href="{{ route('logout') }}"><i class="icons icon-logout"></i> {{ __('message.menu.logout') }}</a>
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
            <li class="@if($controller=='HomeController' && $action=='index')active @endif"><a href="/">{{ __('message.menu.homepage') }}</a></li>
            <li class="@if($controller=='CoursesController')active @endif"><a href="@if(\Illuminate\Support\Facades\Session::get('language') == 'vi') {{ route('client.list_courses') }} @else {{ route('client.list_courses.en') }} @endif">{{ __('message.menu.course') }}</a>
              <ul class="main-nav__sub">
                <li><a href="@if(\Illuminate\Support\Facades\Session::get('language') == 'vi') {{ route('client.courses.category',['web-development']) }} @else {{ route('client.courses.category.en',['web-development']) }} @endif">Web Development</a></li>
                <li><a href="@if(\Illuminate\Support\Facades\Session::get('language') == 'vi') {{ route('client.courses.category',['mobile-development']) }} @else {{ route('client.courses.category.en',['mobile-development']) }} @endif">Mobile Development</a></li>
                <li><a href="@if(\Illuminate\Support\Facades\Session::get('language') == 'vi') {{ route('client.courses.category',['devops']) }} @else {{ route('client.courses.category.en',['devops']) }} @endif">DevOps</a></li>
              </ul>
            </li>
            <li class="@if($controller=='MoviesController')active @endif"><a href="#">{{ __('message.menu.movie') }}</a></li>
            <li class=""><a href="#">{{ __('message.menu.game') }}</a></li>
            <li class=""><a href="#">{{ __('message.menu.story') }}</a></li>
            <li class=""><a href="#">{{ __('message.menu.manga') }}</a></li>
          </ul>
        </nav>
        <!-- Main Navigation / End -->
      </div>
    </div>
  </div>
  <!-- Header Primary / End -->
</header>