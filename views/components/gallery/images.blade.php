@if (isset($items) && is_array($items))
  <div style="background: purple;">
      @foreach($items as $gallery_item)
          <x-gallery.item :item="$gallery_item" :size="$size" />
      @endforeach
      {{ $slot }}
  </div>
@endif
