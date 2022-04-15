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
              <h2>Courses Management</h2>
          </div>
          <div class="grid grid-cols-12 gap-12 mt-5">
              <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                          <h2 class="font-medium text-base mr-auto">
                              Thêm Khóa Học
                          </h2>                          
                      </div>
                      <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div class="mt-5">
                                    <label class="form-label">Tên Khóa Học</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên Khóa Học">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Tên Khóa Học Eng</label>
                                    <input type="text" name="en_name" class="form-control" placeholder="Tên khóa học Eng">
                                </div>
                                <div class="mt-5 w-52">
                                    <label class="form-label">Hình ảnh</label>
                                    <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        {{-- <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('admin/assets/images/profile-4.jpg') }}">
                                            <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                        </div> --}}
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <input type="file" name="image" class="w-full h-full top-0 left-0">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Kích Thước</label>
                                    <input type="text" name="course_size" class="form-control" placeholder="Kích Thước (Gb)">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Thời Gian</label>
                                    <input type="text" name="course_duration" class="form-control" placeholder="duration">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Thời gian Release</label>
                                    <input type="text" name="course_release" class="form-control" placeholder="Thời gian release">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Trạng Thái</label>
                                    <input type="text" name="course_status" class="form-control" placeholder="Publish/Updated">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Danh Mục Khóa Học</label>                                    
                                    <select class="tom-select w-full" multiple name="category_id[]" placeholder="Chọn danh mục">
                                        @foreach($categories as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Tags</label>                                    
                                    <select class="tom-select w-full" multiple name="tags[]" placeholder="Thẻ">
                                    </select>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Link Gốc</label>
                                    <input type="text" name="original_url" class="form-control" placeholder="Link Gốc">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Nội Dung</label>
                                    <textarea class="editor" id="editorContent" name="content"></textarea>                                    
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Tạo Mới</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary ml-10">Hủy</a>
                        </div>
                      </form>
                  </div>                  
              </div>              
          </div>
      </div>
      <!-- END: Content -->
  </div>
</div>
<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editorContent' );
</script>
<!-- END: Content -->
@endsection
