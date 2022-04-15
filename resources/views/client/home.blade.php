@extends('client.layouts.default')

@section('content')
		<!-- Banner Unit
		================================================== -->
		<div class="hero-unit">
			<div class="container hero-unit__container">
				<div class="hero-unit__content hero-unit__content--left-center">
					<span class="hero-unit__decor">
						<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
					</span>
					<h5 class="hero-unit__subtitle">Kiến Thức - Tổng Hợp - Miễn Phí</h5>
					<h1 class="hero-unit__title"><span class="text-primary">Đại Thư Viện</span></h1>
					<div class="hero-unit__desc">Nơi chia sẽ miễn phí tất cả các tài nguyên được tổng hợp từ Internet.</div>
					<a href="#" class="btn btn-inverse btn-sm btn-outline btn-icon-right btn-condensed hero-unit__btn">Xem Thêm
						<i class="fas fa-plus text-primary"></i></a>
				</div>
			</div>
		</div>

		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">

				<div class="row">
					<!-- Content -->
					<div class="content col-lg-8">

						<!-- Featured News Trích Dẫn Hay-->
						<div class="card card--clean">
							<header class="card__header card__header--has-filter">
								<h4>Trích dẫn trong ngày</h4>
							</header>
							<div class="card__content">
								<!-- Slider -->
								<div class="slick posts posts--slider-featured">

									<div class="posts__item posts__item--category-1">
										<a href="#" class="posts__link-wrapper">
											<figure class="posts__thumb">
												<img src="{{ asset('client/images/quote.jpg')}}" alt="">
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">Life</span>
												</div>
												<h4 class="posts__title">Người ta chẳng bao giờ <span class="posts__title-higlight">hài lòng</span> tại nơi mình ở. </h4>
												<div class="post-author">
													<figure class="post-author__avatar">
														<img src="{{ asset('client/images/samples/avatar-4.jpg')}}" alt="Post Author Avatar">
													</figure>
													<div class="post-author__info">
														<h4 class="post-author__name">Hoàng Tử Bé</h4>
														<time datetime="2017-08-28" class="posts__date">Antoine de Saint-Exupéry</time>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="posts__item posts__item--category-3">
										<a href="#" class="posts__link-wrapper">
											<figure class="posts__thumb">
												<img src="{{ asset('client/images/quote.jpg')}}" alt="">
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">Life</span>
												</div>
												<h3 class="posts__title">Người nào có lý do để <span class="posts__title-higlight">sống</span> thì có thể <span class="posts__title-higlight">tồn tại</span> trong mọi nghịch cảnh.</h3>
												<div class="post-author">
													<figure class="post-author__avatar">
														<img src="{{ asset('client/images/samples/avatar-2.jpg')}}" alt="Post Author Avatar">
													</figure>
													<div class="post-author__info">
														<h4 class="post-author__name">Đi tìm lẽ sống</h4>
														<time datetime="2017-08-28" class="posts__date">Viktor Frankl</time>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="posts__item posts__item--category-2">
										<a href="#" class="posts__link-wrapper">
											<figure class="posts__thumb">
												<img src="{{ asset('client/images/quote.jpg')}}" alt="">
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">Life</span>
												</div>
												<h3 class="posts__title">Tôi rất nhớ những ngày tháng  <span class="posts__title-higlight">tuổi thơ</span>, nơi mà điều khó nhất phải làm là quyết định xem bây giờ sẽ chơi trò gì?</h3>
												<div class="post-author">
													<figure class="post-author__avatar">
														<img src="{{ asset('client/images/samples/avatar-4.jpg')}}" alt="Post Author Avatar">
													</figure>
													<div class="post-author__info">
														<h4 class="post-author__name">Cho tôi xin một vé đi tuổi thơ</h4>
														<time datetime="2017-08-28" class="posts__date">Nguyễn Nhật Ánh</time>
													</div>
												</div>
											</div>
										</a>
									</div>

								</div>
								<!-- Slider / End -->
							</div>
						</div>
						<!-- Featured News / End -->

						<div class="card card--clean">
							<header class="card__header card__header--has-filter">
								<h4>Khóa học Mới nhất</h4>
								<a href="/khoa-hoc" class="btn btn-default btn-outline btn-xs card-header__button">Xem tất cả</a>
							</header>
						</div>
						<!-- Post Area 1 Khóa Học -->
						<div class="posts posts--cards post-grid row">
              @foreach ($listHotCourses as $key=>$course)
                <div class="post-grid__item col-sm-6">
                  <div class="posts__item posts__item--card posts__item--category-{{ $key+1 }} card">
                    <figure class="posts__thumb">
						
                      <div class="posts__cat">
												@if(count($course->categories) == 1)
												<a href="{{ route('client.courses.category', [$course->categories[0]->slug]) }}"><span class="label posts__cat-label--category-{{ $key+2 }}">{{ $course->categories[0]->name }}</span></a>
												@else
													@foreach($course->categories as $k=>$c)
														<a href="{{ route('client.courses.category', [$c->slug]) }}"><span class="label posts__cat-label--category-{{ $k+$key+2 }}">{{ $c->name }}</span></a>
													@endforeach
												@endif
											</div>
                      <a href="{{ route('client.courses', [$course->slug]) }}.html"><img src="{{ asset($course->image)}}" alt="" style="width: 377px; height: 200px"></a>
                    </figure>
                    <div class="posts__inner card__content">
                      <time datetime="2016-08-23" class="posts__date">{{ $course->updated_at->format('M dS, Y') }}</time>
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
                          <h4 class="post-author__name">Bởi {{ $course->created_by }}</h4>
                        </div>
                      </div>
                      {{-- <ul class="post__meta meta">
                        <li class="meta__item meta__item--views">2369</li>
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a>
                        </li>
                        <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                      </ul> --}}
                    </footer>
                  </div>
                </div>
              @endforeach
						</div>

            
						
            
					</div>
					<!-- Content / End -->

					<!-- Sidebar -->
					<div id="sidebar" class="sidebar col-lg-4">
						<!-- Widget: Social Buttons -->
						@include('client.partials.social_widget')
						<!-- Widget: Social Buttons / End -->

						@include('client.partials.hot_courses_right_slide', ['listViewCourses' => $listViewCourses])

						<!-- Widget: Trending News -->
						{{-- <aside class="widget widget--sidebar card widget-tabbed">
							<div class="widget__title card__header">
								<h4>Top Theo dõi</h4>
							</div>
							<div class="widget__content card__content">
								<div class="widget-tabbed__tabs">
									<!-- Widget Tabs -->
									<ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
										<li class="nav-item"><a href="#widget-tabbed-newest" class="nav-link active"
												aria-controls="widget-tabbed-newest" role="tab" data-toggle="tab">Truyện</a></li>
										<li class="nav-item"><a href="#widget-tabbed-commented" class="nav-link"
												aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab">Truyện Tranh</a></li>
										<li class="nav-item"><a href="#widget-tabbed-popular" class="nav-link"
												aria-controls="widget-tabbed-popular" role="tab" data-toggle="tab">Phim</a></li>
									</ul>

									<!-- Widget Tab panes -->
									<div class="tab-content widget-tabbed__tab-content">
										<!-- Newest -->
										<div role="tabpanel" class="tab-pane fade show active" id="widget-tabbed-newest">
											<ul class="posts posts--simple-list">

												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next
																month</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting
																guard</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the
																Final</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-3">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">Playoffs</span>
														</div>
														<h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the
																big game</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">The Female Division is growing strong after their third
																game</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>

											</ul>
										</div>
										<!-- Commented -->
										<div role="tabpanel" class="tab-pane fade" id="widget-tabbed-commented">
											<ul class="posts posts--simple-list">

												<li class="posts__item posts__item--category-3">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">Playoffs</span>
														</div>
														<h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the
																big game</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">The Female Division is growing strong after their third
																game</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting
																guard</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the
																Final</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next
																month</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next
																month</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>

											</ul>
										</div>
										<!-- Popular -->
										<div role="tabpanel" class="tab-pane fade" id="widget-tabbed-popular">
											<ul class="posts posts--simple-list">

												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting
																guard</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the
																Final</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next
																month</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-1">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">The Team</span>
														</div>
														<h6 class="posts__title"><a href="#">The Female Division is growing strong after their third
																game</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>
												<li class="posts__item posts__item--category-3">
													<div class="posts__inner">
														<div class="posts__cat">
															<span class="label posts__cat-label">Playoffs</span>
														</div>
														<h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the
																big game</a></h6>
														<time datetime="2016-08-23" class="posts__date">August 23rd, 2018</time>
														<div class="posts__excerpt">
															Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt
															ut labore et dolore magna aliqua.
														</div>
													</div>
												</li>

											</ul>
										</div>
									</div>

								</div>
							</div>
						</aside> --}}
						<!-- Widget: Trending News / End -->

						<!-- Widget: Banner -->
						<aside class="widget card widget--sidebar widget-banner">
							<div class="widget__title card__header">
								<h4>Advertisement</h4>
							</div>
							<div class="widget__content card__content">
								<figure class="widget-banner__img">
									<a
										href="https://themeforest.net/item/the-alchemists-sports-news-html-template/19106722?ref=dan_fisher"><img
											src="{{ asset('client/images/samples/banner.jpg')}}" alt="Banner"></a>
								</figure>
							</div>
						</aside>
						<!-- Widget: Banner / End -->
					</div>
					<!-- Sidebar / End -->
				</div>

			</div>
		</div>
		<!-- Content / End -->    
@endsection