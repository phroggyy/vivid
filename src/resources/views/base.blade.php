@extends(config('vivid.public.template'))

@section(config('vivid.public.section'))
    <div class="{{ config('vivid.public.root_classes') }}">
        @yield('vivid-content')
    </div>
@endsection