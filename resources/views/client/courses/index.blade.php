@extends('client.layouts.default')
@section('content')
<!-- Pushy Panel -->
<aside class="pushy-panel ">
  <div class="pushy-panel__inner">
    <header class="pushy-panel__header">
      <div class="pushy-panel__logo">
        <a href="/"><img src="{{ asset('admin/assets/logos/logo.png') }}" srcset="{{ asset('admin/assets/logos/logo.png') }}" alt="DaiThuVien"></a>
      </div>
    </header>
  </div>
</aside>
<!-- Pushy Panel / End -->

<!-- Page Heading
================================================== -->
<div class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <h1 class="page-heading__title">Khóa Học <span class="highlight">Mới</span></h1>
        <ol class="page-heading__breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('homepage')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Khóa Học</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Page Heading / End -->

<!-- Post Filter -->
<div class="post-filter">
  <div class="container">
    <form action="{{route('client.list_courses')}}" class="post-filter__form clearfix">
      @if($data != null)
      <div class="post-filter__select">
        <label class="post-filter__label">Danh Mục</label>
        <select class="cs-select cs-skin-border" name="category">
            <option value="all">Tất Cả</option>  
            @foreach($lsCategoryInCourses as $key=>$cate)
              <option value="{{$cate->name}}" @if($data['category'] == $cate->name) selected @else @endif>{{$cate->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="post-filter__select">
        <label class="post-filter__label">Lọc Bởi</label>
        <select class="cs-select cs-skin-border" name="filterBy">
          <option value="date" @if($data['filterBy'] == 'date') selected @endif>Ngày Tạo</option>
          <option value="id" @if($data['filterBy'] == 'id') selected @endif>ID</option>
        </select>
      </div>
      <div class="post-filter__select">
        <label class="post-filter__label">Sắp Xếp</label>
        <select class="cs-select cs-skin-border" name="sortBy">
          <option value="ascending" @if($data['sortBy'] == 'ascending') selected @endif>Cũ Nhất</option>
          <option value="descending" @if($data['sortBy'] == 'descending') selected @endif>Mới nhất</option>
        </select>
      </div>
      @else
      <div class="post-filter__select">
        <label class="post-filter__label">Danh Mục</label>
        <select class="cs-select cs-skin-border" name="category">
            <option value="all" selected>Tất Cả</option>  
            @foreach($lsCategoryInCourses as $key=>$cate)
              <option value="{{$cate->name}}">{{$cate->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="post-filter__select">
        <label class="post-filter__label">Lọc Bởi</label>
        <select class="cs-select cs-skin-border" name="filterBy">
          <option value="date" selected>Ngày Tạo</option>
          <option value="id">ID</option>
        </select>
      </div>
      <div class="post-filter__select">
        <label class="post-filter__label">Sắp Xếp</label>
        <select class="cs-select cs-skin-border" name="sortBy">
          <option value="ascending">Cũ Nhất</option>
          <option value="descending" selected>Mới nhất</option>
        </select>
      </div>
      @endif
      {{-- <div class="post-filter__select">
        <label class="post-filter__label">Author</label>
        <select class="cs-select cs-skin-border">
          <option value="" disabled selected>All Authors</option>
          <option value="all">All Authors</option>
          <option value="author1">James Spiegel</option>
          <option value="author2">Jessica Hoops</option>
          <option value="author3">Mark Johnson</option>
        </select>
      </div> --}}
      <div class="post-filter__submit">
        <button type="submit" class="btn btn-default btn-lg btn-block">Lọc Khóa Học</button>
      </div>
    </form>
  </div>
</div>
<!-- Post Filter / End -->

<!-- Content
================================================== -->
<div class="site-content">
  <div class="container">

    <div class="row">
      <!-- Content -->
      <div class="content col-lg-8">

        <!-- Posts Grid -->
        <div class="posts posts--cards post-grid post-grid--2cols post-grid--fitRows row">

          @foreach($courses as $key=>$course)
          <div class="post-grid__item col-6">
            <div class="posts__item posts__item--card posts__item--category-{{rand (1,5)}} card">
              <figure class="posts__thumb">
                <div class="posts__cat">
                @if(count($course->categories) == 1)
						<a href="{{ route('client.courses.category', [$course->categories[0]->slug]) }}"><span class="label posts__cat-label--category-{{ $key+1 }}">{{ $course->categories[0]->name }}</span></a>
						@else
					  		@foreach($course->categories as $k=>$c)
                  <a href="{{ route('client.courses.category', [$c->slug]) }}"><span class="label posts__cat-label--category-{{ $k+$key+1 }}">{{ $c->name }}</span></a>
							@endforeach
						@endif
                </div>
                <a href="{{ route('client.courses', [$course->slug]) }}.html"><img src="{{ asset($course->image)}}" alt=""></a>
              </figure>
              <div class="posts__inner card__content">
                {{-- <a href="#" class="posts__cta"></a> --}}
                <time datetime="2016-08-23" class="posts__date">{{ $course->updated_at->format('d/m/Y') }}</time>
                <h6 class="posts__title main__page"><a href="{{ route('client.courses', [$course->slug]) }}.html">{{ $course->en_name }}</a></h6>
                <div class="posts__excerpt text-center" style="padding: 10px;">
                  <span>{{ $course->course_status }} {{ $course->course_release }}</span><br/>
                  <span>MP4 | Video: h264, 1280x720</span><br/>
                  <span>Durations: {{ $course->course_duration }}</span><br/>
                  <span>Size: {{ $course->course_size }} GB</span>
                </div>
              </div>
              <footer class="posts__footer card__footer">
                <div class="post-author">
                  <figure class="post-author__avatar">
                    <img src="{{ asset('admin/assets/logos/logo.png')}}" alt="Post Author Avatar">
                  </figure>
                  <div class="post-author__info">                    
                    <h4 class="post-author__name">Bởi {{ $course->updated_by }}</h4>
                  </div>
                </div>
                {{-- <ul class="post__meta meta">
                  <li class="meta__item meta__item--views">2369</li>
                  <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                  <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                </ul> --}}
              </footer>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Post Grid / End -->

        <!-- Post Pagination -->
        <nav class="post-pagination" aria-label="Blog navigation">
          {{ $courses->render('client.partials.paging') }}
        </nav>
        <!-- Post Pagination / End -->

      </div>
      <!-- Content / End -->

      <!-- Sidebar -->
      <div id="sidebar" class="sidebar col-lg-4">

        <!-- Widget: Social Buttons -->        
				@include('client.partials.social_widget')
        <!-- Widget: Social Buttons / End -->

        @include('client.partials.hot_courses_right_slide', ['listViewCourses' => $latestCourses])

        <!-- Widget: Tag Cloud -->
        @include('client.partials.course_categories', $lsCategoryInCourses)
        <!-- Widget: Tag Cloud / End -->

        <!-- Widget: Banner -->
        <aside class="widget card widget--sidebar widget-banner">
          <div class="widget__title card__header">
            <h4>Advertisement</h4>
          </div>
          <div class="widget__content card__content">
            
          </div>
        </aside>
        <!-- Widget: Banner / End -->
      </div>
      <!-- Sidebar / End -->
    </div>

  </div>
</div>
@endsection