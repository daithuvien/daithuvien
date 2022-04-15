@extends('client.layouts.default', ['fText' => 'Đại Thư Viện', 'fYear' => '2022'])

@section('content')
		<!-- Page Heading
		================================================== -->
		<div class="page-heading">
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<h1 class="page-heading__title"><span class="highlight">Đăng Nhập</span></h1>
					</div>
				</div>
			</div>
		</div>
		<!-- Page Heading / End -->
		

		
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
				<div class="row">
					@if(Session::has('message'))
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								{{Session::get('message')}}
							</div>
						</div>
					@endif

					<div class="col-md-6">
		
						<!-- Login -->
						<div class="card">
							<div class="card__header">
								<h4>Đăng Nhập</h4>
							</div>
							<div class="card__content">
		
								<!-- Login Form -->
								<form action="{{ route('login') }}" method="POST">@csrf
									<div class="form-group">
										<label for="login-name">Email</label>
										<input type="email" name="email" id="login-name" class="form-control" placeholder="Enter your email address...">
									</div>
									<div class="form-group">
										<label for="login-password">Mật Khẩu</label>
										<input type="password" name="password" id="login-password" class="form-control" placeholder="Enter your password...">
									</div>
									<div class="form-group form-group--password-forgot">
										<label class="checkbox checkbox-inline">
											<input type="checkbox" id="inlineCheckbox1" value="option1" checked> Ghi nhớ tài khoản
											<span class="checkbox-indicator"></span>
										</label>
										<span class="password-reminder">Quên Mật khẩu? <a href="#">Click Here</a></span>
									</div>
									<div class="form-group form-group--sm">
										<button type="submit" class="btn btn-primary-inverse btn-lg btn-block">Đăng Nhập</button>
									</div>
									<div class="row">
										<div class="col-md-6">
											<a href="#" class="btn btn-facebook btn-icon btn-block"><i class="fab fa-facebook"></i> Đăng Nhập bằng Facebook</a>
										</div>
										<div class="col-md-6">
											<a href="#" class="btn btn-social-counter--gplus btn-icon btn-block" style="color: white;"><i class="fab fa-google"></i> Đăng Nhập bằng Google</a>
										</div>
									</div>
								</form>
								<!-- Login Form / End -->
		
							</div>
						</div>
						<!-- Login / End -->
					</div>
		
					<div class="col-md-6">
		
						<!-- Register -->
						<div class="card">
							<div class="card__header">
								<h4>Đăng ký ngay</h4>
							</div>
							<div class="card__content">
		
								<!-- Register Form -->
								<form method="POST" action="{{ route('register') }}">@csrf
									<div class="form-group">
										<label for="register-name">Email</label>
										<input type="email" name="email" id="register-name" class="form-control" placeholder="Enter your email address...">
									</div>
									<div class="form-group">
										<label for="register-password">Mật khẩu</label>
										<input type="password" name="password" id="register-password" class="form-control" placeholder="Enter your password...">
									</div>
									<div class="form-group">
										<label for="repeat-password">Xác nhận mật khẩu</label>
										<input type="password" name="password_confirmation" id="repeat-password" class="form-control" placeholder="Repeat your password...">
									</div>
									<div class="form-group form-group--submit">
										<button type="submit" class="btn btn-default btn-lg btn-block">Đăng ký tài khoản</button>
									</div>
								</form>
								<!-- Register Form / End -->
		
							</div>
						</div>
						<!-- Register / End -->
					</div>
		
				</div>
			</div>
		</div>
		<!-- Content / End -->
@endsection
