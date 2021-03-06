@extends('simple-cms::layouts.master')


@section('head')
    <link rel="stylesheet" href="{{ asset('simple-cms/css/site/app.css') }}">

    <title>{{ $settings->website_title }}{{ isset($content) ? ' - ' . $content->title : '' }}</title>

    <meta name="description"
          content="{{ isset($content) && !empty($content->teaser) ?  $content->teaser : '' }}">

    <meta name="keywords"
          content="{{ isset($content) && !empty($content->keywords) ?  $content->keywords : '' }}">
@stop

@section('body')
    <main class="container" style="{{ $isMobile ? 'margin-top: 0px' : '' }}">
        @yield('content')
    </main>
@endsection

@section('footer')
    <footer class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="">
                        @foreach(\Mc388\SimpleCms\App\Models\Content::getGlobal() as $node)
                            <li>
                                <a href="{{ $node->getUrl() }}">{{ $node->nav_title  }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <address>
                        <strong>{{ $contact->name }}</strong><br><br>
                        {{ $contact->street }}, {{ $contact->postal_code }} {{ $contact->city }}<br><br>
                        {!! empty($contact->phone) ? '' : '<i class="glyphicon glyphicon-earphone"></i> ' . $contact->phone . '<br>' !!}
                        {!! empty($contact->fax) ? '' : '<i class="glyphicon glyphicon-print"></i> ' . $contact->fax . '<br>' !!}
                        {!! empty($contact->mobile) ? '' : '<i class="glyphicon glyphicon-phone"></i> ' . $contact->mobile . '<br>' !!}
                        {!! empty($contact->email) ? '' : '<i class="glyphicon glyphicon-envelope"></i> ' . $contact->email . '<br>' !!}
                    </address>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section('scripts')
    @yield('scripts')

    @include('simple-cms::site.partials.googleanalytics')
@stop
