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
                                    <label class="form-label">Ngày Deliver</label>
                                    <div>
                                        <input datepicker datepicker-format="dd-mm-yyyy" type="text" class="datepicker form-control w-56" data-single-mode="true" name="date_to_deliver">
                                        <select name="hours_to_deliver" id="" class="outline-none appearance-none bg-transparent ml-20">
                                            <option value="00">00</option>
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="5">05</option>
                                            <option value="6">06</option>
                                            <option value="7">07</option>
                                            <option value="8">08</option>
                                            <option value="9">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select>
                                        <span class="px-2">:</span>
                                        <select name="minute_to_deliver" id="" class="outline-none appearance-none bg-transparent">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                        </select>
                                    </div>
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

