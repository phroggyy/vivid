@extends(config('vivid.admin.template'))

@section(config('vivid.admin.section'))
    <div class="{{ config('vivid.admin.root_classes') }}">
        @yield('vivid-content')
    </div>
@endsection