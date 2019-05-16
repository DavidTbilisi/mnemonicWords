@extends('layouts.base')
@section('top-nav')
@include('incs.nav')
@endsection


@section('video')
{{--/სლაიდ შორ ჯობს მგონია--}}
    <iframe uk-cover src="https://www.youtube-nocookie.com/embed/YE7VzlLtp-4?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="100%" height="80%" frameborder="0" allowfullscreen uk-video="automute: true"></iframe>

@endsection