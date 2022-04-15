@extends('client.layouts.default')
@section('content')
<!-- Pushy Panel -->
<aside class="pushy-panel ">
  <div class="pushy-panel__inner">
    <header class="pushy-panel__header">
      <div class="pushy-panel__logo">
        <a href="index.html"><img src="{{ asset('admin/assets/logos/logo.png') }}" srcset="{{ asset('admin/assets/logos/logo.png') }}" alt="Đại Thư Viện"></a>
      </div>
    </header>
    <div class="pushy-panel__content">

      <!-- Widget: Posts -->
      <aside class="widget widget--side-panel">
        <div class="widget__content">
          <ul class="posts posts--simple-list posts--simple-list--lg">
            <li class="posts__item posts__item--category-1">
              <div class="posts__inner">
                <div class="posts__cat">
                  <span class="label posts__cat-label">The Team</span>
                </div>
                <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                <div class="posts__excerpt">
                  Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                </div>
              </div>
              <footer class="posts__footer card__footer">
                <div class="post-author">
                  <figure class="post-author__avatar">
                    <img src="assets/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                  </figure>
                  <div class="post-author__info">
                    <h4 class="post-author__name">James Spiegel</h4>
                  </div>
                </div>
                <ul class="post__meta meta">
                  <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                  <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                </ul>
              </footer>
            </li>
            <li class="posts__item posts__item--category-2">
              <div class="posts__inner">
                <div class="posts__cat">
                  <span class="label posts__cat-label">Injuries</span>
                </div>
                <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                <div class="posts__excerpt">
                  Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                </div>
              </div>
              <footer class="posts__footer card__footer">
                <div class="post-author">
                  <figure class="post-author__avatar">
                    <img src="assets/images/samples/avatar-2.jpg" alt="Post Author Avatar">
                  </figure>
                  <div class="post-author__info">
                    <h4 class="post-author__name">Jessica Hoops</h4>
                  </div>
                </div>
                <ul class="post__meta meta">
                  <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                  <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                </ul>
              </footer>
            </li>
          </ul>
        </div>
      </aside>
      <!-- Widget: Posts / End -->

      <!-- Widget: Tag Cloud -->
      <aside class="widget widget--side-panel widget-tagcloud">
        <div class="widget__title">
          <h4>Tag Cloud</h4>
        </div>
        <div class="widget__content">
          <div class="tagcloud">
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYOFFS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">ALCHEMISTS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INJURIES</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">TEAM</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INCORPORATIONS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">UNIFORMS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">CHAMPIONS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PROFESSIONAL</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">COACH</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">STADIUM</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">NEWS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYERS</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">WOMEN DIVISION</a>
            <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">AWARDS</a>
          </div>
        </div>
      </aside>
      <!-- Widget: Tag Cloud / End -->

      <!-- Widget: Banner -->
      <aside class="widget widget--side-panel widget-banner">
        <div class="widget__content">
          <figure class="widget-banner__img">
            <a href="#"><img src="assets/images/samples/banner.jpg" alt="Banner"></a>
          </figure>
        </div>
      </aside>
      <!-- Widget: Banner / End -->

    </div>
    <a href="#" class="pushy-panel__back-btn"></a>
  </div>
</aside>
<!-- Pushy Panel / End -->

<!-- Page Heading
================================================== -->
<div class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <h1 class="page-heading__title">Khóa Học <span class="highlight">{{ $cat->name }}</span></h1>
        <ol class="page-heading__breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
          <li class="breadcrumb-item"><a href="/khoa-hoc">Khóa Học</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $cat->name }}</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Page Heading / End -->

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
                <a href="{{ route('client.courses', [$course->slug]) }}.html"><img src="{{ asset($course->image) }}" alt=""></a>
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

        <!-- Widget: Popular News -->
        <aside class="widget widget--sidebar card widget-popular-posts">
          <div class="widget__title card__header">
            <h4>Popular News</h4>
          </div>
          <div class="widget__content card__content">
            <ul class="posts posts--simple-list">
        
              <li class="posts__item posts__item--category-2">
                <figure class="posts__thumb">
                  <a href="#"><img src="assets/images/samples/post-img1-xs.jpg" alt=""></a>
                </figure>
                <div class="posts__inner">
                  <div class="posts__cat">
                    <span class="label posts__cat-label">Injuries</span>
                  </div>
                  <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                  <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                </div>
              </li>
              <li class="posts__item posts__item--category-1">
                <figure class="posts__thumb">
                  <a href="#"><img src="assets/images/samples/post-img2-xs.jpg" alt=""></a>
                </figure>
                <div class="posts__inner">
                  <div class="posts__cat">
                    <span class="label posts__cat-label">The Team</span>
                  </div>
                  <h6 class="posts__title"><a href="#">Jay Rorks is only 24 points away from breaking the record</a></h6>
                  <time datetime="2016-08-23" class="posts__date">August 22nd, 2018</time>
                </div>
              </li>
              <li class="posts__item posts__item--category-1">
                <figure class="posts__thumb">
                  <a href="#"><img src="assets/images/samples/post-img3-xs.jpg" alt=""></a>
                </figure>
                <div class="posts__inner">
                  <div class="posts__cat">
                    <span class="label posts__cat-label">The Team</span>
                  </div>
                  <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                  <time datetime="2016-08-23" class="posts__date">June 8th, 2018</time>
                </div>
              </li>
              <li class="posts__item posts__item--category-1">
                <figure class="posts__thumb">
                  <a href="#"><img src="assets/images/samples/post-img4-xs.jpg" alt=""></a>
                </figure>
                <div class="posts__inner">
                  <div class="posts__cat">
                    <span class="label posts__cat-label">The Team</span>
                  </div>
                  <h6 class="posts__title"><a href="#">The team is starting a new power breakfast regimen</a></h6>
                  <time datetime="2016-08-23" class="posts__date">May 12th, 2018</time>
                </div>
              </li>
        
            </ul>
          </div>
        </aside>
        <!-- Widget: Popular News / End -->

        <!-- Widget: Categories In Course -->
        @include('client.partials.course_categories', $lsCategoryInCourses)
        <!-- Widget: Tag Cloud / End -->

        <!-- Widget: Banner -->
        <aside class="widget card widget--sidebar widget-banner">
          <div class="widget__title card__header">
            <h4>Advertisement</h4>
          </div>
          <div class="widget__content card__content">
            <figure class="widget-banner__img">
              <a href="https://themeforest.net/item/the-alchemists-sports-news-html-template/19106722?ref=dan_fisher"><img src="assets/images/samples/banner.jpg" alt="Banner"></a>
            </figure>
          </div>
        </aside>
        <!-- Widget: Banner / End -->

        <!-- Widget: Trending News -->
        <aside class="widget widget--sidebar card widget-tabbed">
          <div class="widget__title card__header">
            <h4>Top Trending News</h4>
          </div>
          <div class="widget__content card__content">
            <div class="widget-tabbed__tabs">
              <!-- Widget Tabs -->
              <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                <li class="nav-item"><a href="#widget-tabbed-sm-newest" class="nav-link active" aria-controls="widget-tabbed-sm-newest" role="tab" data-toggle="tab">Newest</a></li>
                <li class="nav-item"><a href="#widget-tabbed-sm-commented" class="nav-link" aria-controls="widget-tabbed-sm-commented" role="tab" data-toggle="tab">Most Commented</a></li>
                <li class="nav-item"><a href="#widget-tabbed-sm-popular" class="nav-link" aria-controls="widget-tabbed-sm-popular" role="tab" data-toggle="tab">Popular</a></li>
              </ul>
        
              <!-- Widget Tab panes -->
              <div class="tab-content widget-tabbed__tab-content">
                <!-- Newest -->
                <div role="tabpanel" class="tab-pane fade show active" id="widget-tabbed-sm-newest">
                  <ul class="posts posts--simple-list">
        
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next month</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting guard</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the Final</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
        
                  </ul>
                </div>
                <!-- Commented -->
                <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-sm-commented">
                  <ul class="posts posts--simple-list">
        
                    <li class="posts__item posts__item--category-3">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">Playoffs</span>
                        </div>
                        <h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the big game</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">The Female Division is growing strong after their third game</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting guard</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
        
                  </ul>
                </div>
                <!-- Popular -->
                <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-sm-popular">
                  <ul class="posts posts--simple-list">
        
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting guard</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the Final</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
                    <li class="posts__item posts__item--category-1">
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label">The Team</span>
                        </div>
                        <h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next month</a></h6>
                        <time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
                        <div class="posts__excerpt">
                          Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                      </div>
                    </li>
        
                  </ul>
                </div>
              </div>
        
            </div>
          </div>
        </aside>
        <!-- Widget: Trending News / End -->

      </div>
      <!-- Sidebar / End -->
    </div>

  </div>
</div>
@endsection