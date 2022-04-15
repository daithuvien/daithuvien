<aside class="widget widget--sidebar card widget-tagcloud">
  <div class="widget__title card__header">
    <h4>Danh Mục Khóa Học</h4>
  </div>
  <div class="widget__content card__content">
    <div class="tagcloud">
      @foreach($lsCategoryInCourses as $cat)
      <a href="{{ route('client.courses.category', [$cat->slug]) }}" class="btn btn-primary btn-xs btn-outline btn-sm" style="text-transform: none;font-size: 12px;">{{ $cat->name }}</a>
      @endforeach
    </div>
  </div>
</aside>