@extends('admin.layouts.application',[
        'menu' => 'management',
        'title' => 'Roles Management'
    ])


@section('content')
<div class="wrapper wrapper--top-nav">
  <div class="wrapper-box">
      <!-- BEGIN: Content -->
      <div class="content">
          <div class="intro-y flex items-center mt-8">
              <h2 class="text-lg font-medium mr-auto">
                  Data Management
              </h2>
          </div>
          <div class="grid grid-cols-12 gap-6 mt-5">
              
              <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Table Head Options -->
                  <div class="intro-y box">
                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                          <h2 class="font-medium text-base mr-auto">
                              Danh Sách Links
                          </h2>
                          <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <a href="{{ route('data.create') }}" class="btn btn-success">Thêm Link</a>
                          </div>
                      </div>
                      <div class="p-5" id="head-options-table">
                          @include('admin.partials.notification')
                          @if(count($data) > 0)
                          <div class="preview">
                              <div class="overflow-x-auto">
                                  <table class="table">
                                      <thead class="table-dark">
                                          <tr>
                                              <th class="whitespace-nowrap">#</th>
                                              <th class="whitespace-nowrap">ID</th>
                                              <th class="whitespace-nowrap">URL</th>
                                              <th class="whitespace-nowrap">Người Tạo</th>
                                              <th class="whitespace-nowrap">Ngày Tạo</th>
                                              <th class="whitespace-nowrap">Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($data as $key=>$data)
                                          <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->url }}</td>
                                            <td>{{ $data->created_by }}</td>
                                            <td>{{ $data->created_at->format('Y/m/d') }}</td>
                                            <td>
                                              <a href="{{ route('data.edit', [$data->id]) }}" class="btn btn-outline-primary">Chỉnh sửa</a>                                              
                                              <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal{{$data->id}}" class="btn btn-danger">Xóa</a> 
                                              <!-- BEGIN: Modal Content -->
                                              <div id="delete-confirmation-modal{{$data->id}}" class="modal" tabindex="-1" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-body p-0">
                                                              <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                                  <div class="text-3xl mt-5">Xác Nhận?</div>
                                                                  <div class="text-slate-500 mt-2">Bạn có chắc muốn xóa dữ liệu này.</div>
                                                              </div>
                                                              <div class="px-5 pb-8 text-center"> 
                                                                <form action="{{ route('data.destroy', [$data->id]) }}" method="POST">
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