@extends('admin.layouts.application',[
        'menu' => 'management',
        'title' => 'Links Management'
    ])

@section('content')
<!-- BEGIN: Content -->
<div class="wrapper wrapper--top-nav">
  <div class="wrapper-box">
      <!-- BEGIN: Content -->
      <div class="content">
          <div class="intro-y flex items-center mt-8">
              <h2>Link Management</h2>
          </div>
          <div class="grid grid-cols-12 gap-12 mt-5">
              <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                          <h2 class="font-medium text-base mr-auto">
                              Thêm Link
                          </h2>                          
                      </div>
                      <form action="{{route('data.store')}}" method="POST">@csrf
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input type="text" name="url" class="form-control" placeholder="URL">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Tạo Mới</button>
                            <a href="{{ route('data.index') }}" class="btn btn-secondary ml-10">Hủy</a>
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