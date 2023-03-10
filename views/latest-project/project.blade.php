<div>
    <h2>{{ $block_title }}</h2>
    @if ($query->have_posts())
        @while ($query->have_posts())
            @php($query->the_post())
            {{ the_title() }}
            {{ the_excerpt() }}
        @endwhile
        @php($query->reset_post_datas())
    @endif
</div>