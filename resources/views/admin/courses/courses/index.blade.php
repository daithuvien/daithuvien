@extends('admin.layouts.application',[
        'menu' => 'management',
        'title' => 'Courses Management'
    ])


@section('content')
<div class="wrapper wrapper--top-nav">
  <div class="wrapper-box">
      <!-- BEGIN: Content -->
      <div class="content">
          <div class="intro-y flex items-center mt-8">
              <h2 class="text-lg font-medium mr-auto">
                  Courses Management
              </h2>
          </div>
          <div class="grid grid-cols-12 gap-6 mt-5">
              
              <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Table Head Options -->
                  <div class="intro-y box">
                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                          <h2 class="font-medium text-base mr-auto">
                              Danh Sách Khóa Học
                          </h2>
                          <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <a href="{{ route('courses.create') }}" class="btn btn-success">Thêm Khóa Học</a>
                          </div>
                      </div>
                      <div class="p-5" id="head-options-table">
                          @include('admin.partials.notification')
                          @if(count($courses) > 0)
                          <div class="preview">
                              <div class="overflow-x-auto">
                                  <table class="table">
                                      <thead class="table-dark">
                                          <tr>
                                              <th class="whitespace-nowrap">#</th>
                                              <th class="whitespace-nowrap">Image</th>
                                              <th class="whitespace-nowrap">Tên EN</th>
                                              <th class="whitespace-nowrap">Slug</th>
                                              <th class="whitespace-nowrap">Ngườì Tạo</th>
                                              <th class="whitespace-nowrap">Ngày Tạo</th>
                                              <th class="whitespace-nowrap">Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($courses as $key=>$c)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><span style="width: 180px;" ><img src="{{ asset($c->image) }}" style="height: auto; width: 180px;" alt=""></span></td>                                            
                                                <td>{{ $c->en_name }}</td>
                                                <td>{{ $c->slug }}</td>
                                                <td>{{ $c->created_by }}</td>
                                                <td>{{ $c->created_at->format('Y/m/d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.links_in_course', [$c->id]) }}" class="btn btn-dark">Link DL</a>                                              
                                                    <a href="{{ route('courses.edit', [$c->id]) }}" class="btn btn-outline-primary">Chỉnh sửa</a>                                              
                                                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal{{$c->id}}" class="btn btn-danger">Xóa</a> 
                                                    <!-- BEGIN: Modal Content -->
                                                    <div id="delete-confirmation-modal{{$c->id}}" class="modal" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                                        <div class="text-3xl mt-5">Xác Nhận?</div>
                                                                        <div class="text-slate-500 mt-2">Bạn có chắc muốn xóa dữ liệu này.</div>
                                                                    </div>
                                                                    <div class="px-5 pb-8 text-center"> 
                                                                        <form action="{{ route('courses.destroy', [$c->id]) }}" method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> 
                                                                        <button type="submit" class="btn btn-danger w-24">Xóa</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- END: Modal Content -->
                                                </td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                  </table>                                  
                              </div>
                          </div>                          
                          @endif                   
                      </div>
                  </div>
                  <!-- END: Table Head Options -->
                  
              </div>
          </div>
      </div>
      <!-- END: Content -->
  </div>
</div>
@endsection