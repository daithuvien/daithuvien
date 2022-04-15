<nav class="top-nav">
  <ul>
      <li>
          <a href="{{ route('dashboard') }}" class="top-menu top-menu--active">
              <div class="top-menu__icon"> <i data-lucide="home"></i> </div>
              <div class="top-menu__title"> Dashboard </div>
          </a>
          
      </li>
      <li>
          <a href="javascript:;" class="top-menu">
              <div class="top-menu__icon"> <i data-lucide="box"></i> </div>
              <div class="top-menu__title"> Quản Lý <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
          </a>
          <ul class="">
              <li>
                  <a href="{{ route('roles.index') }}" class="top-menu">
                      <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="top-menu__title"> Roles </div>
                  </a>
              </li>
              <li>
                  <a href="{{ route('users.index') }}" class="top-menu">
                      <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="top-menu__title"> Users </div>
                  </a>
              </li>
              <li>
                  <a href="{{ route('data.index') }}" class="top-menu">
                      <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="top-menu__title"> Data </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="top-menu">
              <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
              <div class="top-menu__title"> Khóa Học <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
          </a>
          <ul class="">
              <li>
                  <a href="{{ route('courses.index') }}" class="top-menu">
                      <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="top-menu__title"> Danh Sách </div>
                  </a>                  
              </li>              
          </ul>
      </li>      
  </ul>
</nav>