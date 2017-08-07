@extends('vivid::admin.base')

@section('vivid-content')
    <div class="columns dir-column dir-row-sm">
        @include('vivid::admin.partials.sidebar')
        <div class="column-12 column-md-9 column-sm-8">
            <form action="{{ route('vivid::admin.posts.update', $post->filename) }}" method="post">
                <div class="columns">
                    <div class="column-12 m-bottom-10">
                        <label>Title</label>
                        <input name="title" type="text" value="{{ $post->title }}">
                    </div>
                    <div class="column-12">
                        <textarea name="content" class="md-editor">{!! $post->content !!}</textarea>
                    </div>
                </div>
                <div class="columns">
                    <div class="column-12">
                        <button class="button" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection