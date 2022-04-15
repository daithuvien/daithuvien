@extends('admin.layouts.application',[
        'menu' => 'management',
        'title' => 'Roles Management'
    ])

@section('content')
<!-- BEGIN: Content -->
<div class="wrapper wrapper--top-nav">
  <div class="wrapper-box">
      <!-- BEGIN: Content -->
      <div class="content">
          <div class="intro-y flex items-center mt-8">
              <h2 class="text-lg font-medium mr-auto">
                Users Management
              </h2>
          </div>
          <div class="grid grid-cols-12 gap-12 mt-5">
              <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                          <h2 class="font-medium text-base mr-auto">
                              Cập nhật Người Dùng
                          </h2>                          
                      </div>
                      <form action="{{route('users.update', [$user->id])}}" method="POST">{{method_field('PUT')}}@csrf
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div class="mt-3">
                                    <label class="form-label">Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên Người dùng" value="{{ $user->name }}">
                                </div>
                                <div class="mt-3">
                                  <label class="form-label">Email</label>
                                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                </div>
                                <div class="mt-3">
                                  <label class="form-label">Quyền</label>
                                  <select class="form-select mt-2 sm:mr-2" aria-label="--" name="role">
                                    @foreach($roles as $role)
                                      <option value={{ $role->id }} @if($role->id == $user->role->id) selected @endif>{{ $role->name }}</option>
                                    @endforeach                                  
                                  </select> 
                                </div>
                                <div class="mt-3">
                                  <label class="form-label">Mật Khẩu</label>
                                  <input name="password" type="password" class="form-control" placeholder="Mật khẩu" value="{{ $user->password }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Cập Nhật</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary ml-10">Hủy</a>
                        </div>
                      </form>
                  </div>                  
              </div>              
          </div>
      </div>
      <!-- END: Content -->
  </div>
</div>
<!-- END: Content -->
@endsection