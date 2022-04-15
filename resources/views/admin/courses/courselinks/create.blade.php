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
                {{ $course->en_name }} -- Link Downloads
              </h2>
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
                      <form action="{{route('admin.create_links_in_course.store',[$course->id])}}" method="POST">@csrf
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div class="mt-5">
                                    <label class="form-label">Nhà Cung Cấp</label>
                                    <input type="text" name="provider_name" class="form-control" placeholder="Nhà cung cấp Fshare/GoogleDrive/etc">
                                </div>
                                <div class="mt-5">
                                  <label class="form-label">Phần</label>
                                  <input type="text" name="provider_part" class="form-control" placeholder="Part1, Part2, ...">
                                </div>
                                <div class="mt-5">
                                  <label class="form-label">Link</label>
                                  <input type="text" name="provider_url" class="form-control" placeholder="link hoặc Data ID">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Tạo Mới</button>
                            <a href="{{ route('admin.links_in_course',[$course->id]) }}" class="btn btn-secondary ml-10">Hủy</a>
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