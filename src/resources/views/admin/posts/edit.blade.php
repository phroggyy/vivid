@extends('vivid::admin.base')

@section('vivid-content')
    <div class="columns dir-column dir-row-sm">
        @include('vivid::admin.partials.sidebar')
        <div class="column-12 column-md-9 column-sm-8">
            <form action="{{ $action }}" method="post">
                {{ csrf_field() }}
                @if (isset($method))
                    {{ method_field('PUT') }}
                @endif
                <div class="columns">
                    <div class="column-12 m-bottom-10">
                        <label>Title</label>
                        <input name="title" type="text" value="{{ isset($post) ? $post->title : '' }}">
                    </div>
                    <div class="column-12">
                        <textarea name="content" class="md-editor">{!! isset ($post) ? $post->content : '' !!}</textarea>
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
