<!-- Widget: Popular News -->
<aside class="widget widget--sidebar card widget-popular-posts">
  <div class="widget__title card__header">
    <h4>Khóa học HOT nhất</h4>
  </div>
  <div class="widget__content card__content">
    <ul class="posts posts--simple-list">
      @foreach($listViewCourses as $key=>$course)
      <li class="posts__item posts__item--category-{{ $key+1 }}">
        <figure class="posts__thumb">
          <a href="{{ route('client.courses', [$course->slug]) }}.html"><img style="max-width: 80px;" src="{{ asset($course->image)}}" alt=""></a>
        </figure>
        <div class="posts__inner">
          <div class="posts__cat">
          @if(count($course->categories) == 1)
						<a href="{{ route('client.courses.category', [$course->categories[0]->slug]) }}"><span class="label posts__cat-label--category-{{ $key+1 }}">{{ $course->categories[0]->name }}</span></a>
						@else
					  		@foreach($course->categories as $k=>$c)
                        		<a href="{{ route('client.courses.category', [$c->slug]) }}"><span class="label posts__cat-label--category-{{ $k+$key+1 }}">{{ $c->name }}</span></a>
							@endforeach
						@endif
          </div>
          <h6 class="posts__title main__page" style="font-size: 14px;"><a href="{{ route('client.courses', [$course->slug]) }}.html">{{ $course->en_name }}</a>
          </h6>
          <time datetime="2016-08-23" class="posts__date">{{ $course->updated_at->format('d/m/Y') }}</time>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</aside>
<!-- Widget: Popular News / End -->