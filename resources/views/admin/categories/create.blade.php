@extends('admin.layouts.application',[
        'menu' => 'management',
        'title' => 'Categories Management'
    ])

@section('content')
<!-- BEGIN: Content -->
<div class="wrapper wrapper--top-nav">
  <div class="wrapper-box">
      <!-- BEGIN: Content -->
      <div class="content">
          <div class="intro-y flex items-center mt-8">
              <h2 class="text-lg font-medium mr-auto">
                Categories Management
              </h2>
          </div>
          <div class="grid grid-cols-12 gap-12 mt-5">
              <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                          <h2 class="font-medium text-base mr-auto">
                              Thêm Danh Mục
                          </h2>                          
                      </div>
                      <form action="{{route('categories.store')}}" method="POST">@csrf
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div class="mt-3">
                                    <label class="form-label">Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên Danh mục">
                                </div>                                
                                <div class="mt-3">
                                  <label class="form-label">Danh Mục Cha</label>
                                  <select class="form-select mt-2 sm:mr-2" aria-label="--" name="parent_id">
                                    @if($parent_category)<option value={{$parent_category->id}}>{{$parent_category->name}}</option>
                                    @else
                                    <option value="null" placeholder="Chọn danh mục cha ..."></option>
                                      @foreach($categories as $c)
                                          <option value={{$c->id}}>{{$c->name}}</option>
                                      @endforeach                                  
                                  </select> 
                                    @endif
                                </div>                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Tạo Mới</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary ml-10">Hủy</a>
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