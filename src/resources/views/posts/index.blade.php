@extends('vivid::base')

@section('vivid-content')
    <h1>{{ config('vivid.blog_name') }}</h1>
    <div class="columns dir-column">
        @foreach($posts as $post)
            <div class="column column-sm-10">
                <h2><a href="{{ route('vivid::posts.show', $post->filename) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->excerpt(40) }}</p>
            </div>
        @endforeach
    </div>
@endsection