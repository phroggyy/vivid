@extends('vivid::admin.base')

@section('vivid-content')
    <div class="columns">
        @include('vivid::admin.partials.sidebar')
        <div class="column-12 column-md-9 column-sm-8">
            <h1>Posts</h1>
            <ul>
                @foreach($posts as $post)
                    <li><a href="{{ route('vivid::admin.posts.edit', $post) }}">{{ $post }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection