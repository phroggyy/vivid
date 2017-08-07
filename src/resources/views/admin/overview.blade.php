@extends('vivid::admin.base')

@section('vivid-content')
    <div class="columns">
        @include('vivid::admin.partials.sidebar')
        <div class="column-12 column-md-9 column-sm-8">
            <div class="columns dir-row space-between">
                <h1>Posts</h1>
                <a href="{{ route('vivid::admin.posts.create') }}" class="button">New Post</a>
            </div>
            <ul>
                @foreach($posts as $post)
                    <li><a href="{{ route('vivid::admin.posts.edit', $post) }}">{{ $post }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection