@extends('client.layouts.default')
@section('content')
<div class="site-content">
  <div class="container">

    <div class="row">
      <!-- Content -->
      <div class="content col-lg-8">

        <!-- Article -->
        <article class="card card--lg post post--single">

          <figure class="post__thumbnail">
            <img style="width:100%" src="{{ asset($course->image)}}" alt="">
          </figure>

          <div class="card__content">
            <div class="post__category">
              @foreach ($course->categories as $key=>$cat)
                <a href="{{ route('client.courses.category', [$cat->slug]) }}"><span class="label posts__cat-label-{{ $key+1 }}">{{ $cat->name }}</span></a>
              @endforeach
            </div>
            <header class="post__header">
              <h2 class="post__title">{{ $course->en_name }}</h2>
              <ul class="post__meta meta">
                <li class="meta__item meta__item--date"><time datetime="2017-08-23">{{ $course->updated_at->format('d/m/Y') }}</time></li>
                {{-- <li class="meta__item meta__item--views">2369</li>
                <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                <li class="meta__item meta__item--comments"><a href="#">18</a></li> --}}
              </ul>
            </header>

            <div class="post__content">
              {!! $course->content !!}
            </div>

            <footer class="post__footer">
              <div class="post__tags">
                @foreach ($course->tags as $t)
                  <a href="#" class="btn btn-primary btn-outline btn-xs">{{ $t->text }}</a>    
                @endforeach
              </div>
            </footer>

          </div>
          <!-- Play-by-Play Tabbed Content -->
						<div class="alc-tabs card card--has-table">
		
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified alc-nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" href="#tab-quarter-1" role="tab" data-toggle="tab">
										<span class="d-sm-block">Thông Tin</span>
									</a>
                </li>
								<li class="nav-item">
									<a class="nav-link " href="#tab-quarter-2" role="tab" data-toggle="tab">
                    <span class="d-sm-block">Tải Về</span>
									</a>
                </li>
							</ul>
		
							<!-- Tab panes -->
							<div class="tab-content card__content">
		
								<!-- Tab: #0 -->
								<div role="tabpanel" class="tab-pane fade show active" id="tab-quarter-1">
                  <div class="table-responsive">
                    <table class="table table-hover alc-table-stats alc-table-stats__play-by-play">
                      <tbody>
                        <tr>
                          <td class="alc-align-start alc-highlight-sm">Tên Tiếng Anh</td>
                          <td class="alc-align-start alc-highlight">{{$course->en_name}}</td>
                        </tr>
                        <tr>
                          <td class="alc-align-start alc-highlight-sm">Link Gốc</td>
                          <td class="alc-align-start "><a href="{{ $course->original_url }}" target="_blank">{{ $course->original_url }}</a></td>
                        </tr>
                        <tr>
                          <td class="alc-align-start alc-highlight-sm">Dung Lượng</td>
                          <td class="alc-align-start ">{{ $course->course_size }}Gb</td>
                        </tr>
                        <tr>
                          <td class="alc-align-start alc-highlight-sm">Mật khẩu giải nén</td>
                          <td class="alc-align-start alc-highlight">{{ $course->zip_pass }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>		
								</div>
								<!-- Tab: #0 / End -->
								<!-- Tab: #1 -->
								<div role="tabpanel" class="tab-pane fade " id="tab-quarter-2">
                  @guest
                    <div class="tab-style3 center mt-30 mb-30"> 
                      <p>Vui lòng <a href="#" data-toggle="modal" data-target="#modal-login-register"> Đăng Nhập</a> để có thể Download khóa học này, hoặc <a href="#" data-toggle="modal" data-target="#modal-login-register"> Đăng Ký</a> nếu chưa có tài khoản.</p>
                      
                    </div>
                  @else
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified alc-nav-tabs" role="tablist">
                      @foreach( $lsCourseProvider as $key=>$provider)
                        <li class="nav-item">
                          <a class="nav-link @if($key==0)active @endif" href="#dl{{ $key+1 }}" role="tab" data-toggle="tab">
                            @if(strtolower($provider->provider_name) == "fshare")
                              <span class="d-sm-block"><img src="{{ asset('client/images/icon-fshare.png') }}" style="width: 20px;height: 20px;">  <span class="d-none d-sm-block" style="padding-top: 5px;">{{ $provider->provider_name }}</span></span>
                            @elseif(strtolower($provider->provider_name) == "gdrive")
                              <span class="d-sm-block"><img src="{{ asset('client/images/icon-gdrive.svg') }}" style="width: 20px;height: 20px;">  <span class="d-none d-sm-block" style="padding-top: 5px;">{{ $provider->provider_name }}</span></span>
                            @elseif(strtolower($provider->provider_name) == "rapidgator")
                              <span class="d-sm-block"><img src="{{ asset('client/images/icon.webp') }}" style="width: 20px;height: 20px;">  <span class="d-none d-sm-block" style="padding-top: 5px;">{{ $provider->provider_name }}</span></span>
                            @elseif(strtolower($provider->provider_name) == "nitroflare")
                              <span class="d-sm-block"><img src="{{ asset('client/images/icon-nitroflare.png') }}" style="width: 20px;height: 20px;">  <span class="d-none d-sm-block" style="padding-top: 5px;">{{ $provider->provider_name }}</span></span>
                            @endif
                            
                          </a>
                        </li>
                      @endforeach
                    </ul>
                    <div class="tab-content card__content">
                      @foreach($lsCourseProvider as $key=>$provider)
                        <div role="tabpanel" class="tab-pane fade @if($key==0)active show @endif" id="dl{{ $key+1 }}">
                          <?php $providerLinks = \App\Models\CourseLink::where([['course_id', $course->id],['provider_name',$provider->provider_name]])->get() ?>
                          <div class="row">
                          @if (count($providerLinks) > 1)                            
                            @foreach($providerLinks as $link)
                              <div class="col-md-6 download-btn">
                                <a 
                                  href="{{ url('download/')}}/{{ $course->id }}.{{ $link->provider_url }}" 
                                  target="_blank" 
                                  class="btn btn-primary btn-lg"
                                >
                                  {{ $link->provider_name }} - Part {{ $link->provider_part }}
                                </a>
                              </div>
                            @endforeach                            
                          @else
                            <div class="col-md-6 download-btn">
                              <a 
                                href="{{ url('download/')}}/{{ $course->id }}.{{ $providerLinks->first()->provider_url }}" 
                                target="_blank" 
                                class="btn btn-primary btn-lg"
                              >
                                {{ $provider->provider_name }} Download
                              </a>
                            </div>
                          @endif
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endguest
								</div>
								<!-- Tab: #1 / End -->		
							</div>
		
						</div>
						<!-- Play-by-Play Tabbed Content / End -->
        </article>
        <!-- Article / End -->

        <!-- Post Sharing Buttons -->
        {{-- <div class="post-sharing">
          <a href="#" class="btn btn-default btn-facebook btn-icon btn-block"><i class="fab fa-facebook"></i> <span class="post-sharing__label hidden-xs">Share on Facebook</span></a>
          <a href="#" class="btn btn-default btn-twitter btn-icon btn-block"><i class="fab fa-twitter"></i> <span class="post-sharing__label hidden-xs">Share on Twitter</span></a>
          <a href="#" class="btn btn-default btn-gplus btn-icon btn-block"><i class="fab fa-google-plus-g"></i> <span class="post-sharing__label hidden-xs">Share on Google+</span></a>
        </div> --}}
        <!-- Post Sharing Buttons / End -->
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

        <!-- Widget: Tag Cloud -->
        @include('client.partials.tags', $lsTags)
        <!-- Widget: Tag Cloud / End -->

        <!-- Widget: Banner -->
        <aside class="widget card widget--sidebar widget-banner">
          <div class="widget__title card__header">
            <h4>Advertisement</h4>
          </div>
          <div class="widget__content card__content">
            <figure class="widget-banner__img">
              
            </figure>
          </div>
        </aside>
        <!-- Widget: Banner / End -->
      </div>
      <!-- Sidebar / End -->
    </div>

  </div>
</div>
@endsection