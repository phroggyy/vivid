@extends('vivid::base')

@section('vivid-content')
    <nav class="columns">
        <a href="{{ route('vivid::posts.index') }}">Back to posts</a>
    </nav>
    <div class="columns">
        <div class="column column-sm-10">
            {!! $post->render() !!}
        </div>
    </div>
@endsection