<aside class="widget widget--sidebar card widget-tagcloud">
  <div class="widget__title card__header">
    <h4>Từ Khóa</h4>
  </div>
  <div class="widget__content card__content">
    <div class="tagcloud">
      @foreach($lsTags as $tag)
      <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm" style="text-transform: none;font-size: 12px;">{{ $tag->text }}</a>
      @endforeach
    </div>
  </div>
</aside>