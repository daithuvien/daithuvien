<div class="modal fade" id="modal-login-register" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal--login" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <div class="modal-account-holder">
          <div class="modal-account__item">

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">@csrf
              <h5>Đăng Ký!</h5>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Nhập địa chỉ Email..." name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Nhập mật khẩu..." name="password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Xác nhận mật khẩu..." name="password_confirmation">
              </div>
              <div class="form-group form-group--submit">
                <button type="submit"  class="btn btn-primary btn-block">Đăng ký Tài Khoản</button>
              </div>
              <div id="notificationRegister" class="modal-form--note">Vui lòng kiểm tra email để tiến hành xác thực tài khoản.</div>
            </form>
            <!-- Register Form / End -->

          </div>
          <div class="modal-account__item">

            <!-- Login Form -->
            <form action="{{ route('login') }}" class="form validation_form" method="POST">@csrf
              <h5>Đăng nhập</h5>
              <div class="form-group">
                <input type="email" required class="form-control" name="email" placeholder="Nhập email hoặc tên tài khoản...">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">                
              </div>
              {{-- <div class="form-group form-group--pass-reminder">
                <label class="checkbox checkbox-inline">
                  <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Nhớ tài khoản
                  <span class="checkbox-indicator"></span>
                </label>
                <a href="#">Quên mật khẩu?</a>
              </div> --}}
              <div class="form-group form-group--submit">
                <button type="submit" class="btn btn-primary-inverse btn-block">Đăng Nhập</button>
              </div> 
              <div class="modal-form--social">
                <h6>hoặc Đăng nhập với:</h6>
                <ul class="social-links social-links--btn text-center">
                  <li class="social-links__item">
                    <a href="#" class="social-links__link social-links__link--lg social-links__link--fb"><i
                        class="fab fa-facebook"></i></a>
                  </li>
                  <li class="social-links__item">
                    <a href="#" class="social-links__link social-links__link--lg social-links__link--gplus"><i
                        class="fab fa-google-plus-g"></i></a>
                  </li>
                </ul>
              </div>
            </form>
            <!-- Login Form / End -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>