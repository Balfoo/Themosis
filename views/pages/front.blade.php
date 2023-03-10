@extends('layouts.main')

@php
    $coucou = "Toto";
@endphp

@section('content')
    <x-alert>
        <h1>Welcome</h1>
    </x-alert>

    @if(have_posts())
            <header>
                <x-title level="2" id="header-title" :toto="$coucou">
{{--                    Les : servent à passer la variable --}}
                    {{ single_post_title('', false) }}
                </x-title>
            </header>

            <x-gallery.images :items="get_field('gallery_image')" size="medium"/>

        @while(have_posts())
            @php(the_post())
            @template('parts.content', get_post_type())
        @endwhile
        {!! get_the_posts_navigation() !!}
    @else
        @template('parts.content', 'none')
    @endif
@endsection