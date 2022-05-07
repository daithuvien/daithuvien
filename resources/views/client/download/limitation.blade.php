@extends('client.layouts.default', ['fText' => 'Đại Thư Viện', 'fYear' => '2022'])

@section('content')
<div class="site-content">
  <div class="container">
    <h3>Giới Hạn Tải Về</h3>
    <div class="alert alert-danger text-white">
      <p>Tài khoản Thành Viên chỉ có 3 lượt Tải về bằng link VIP trong ngày.</p>
      <p>Vui lòng đợi đến ngày hôm sau, Sử dụng các loại link khác hoặc nâng cấp tài khoản của bạn</p>
    </div>
  </div>
</div>
@endsection