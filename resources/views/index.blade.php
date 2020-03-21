@extends('layouts.site')

@section('header')
    {!! $header !!}
@endsection

@section('content')
    {!! $content !!}

    <!-- contact_form -->
    @include('contactForm')
    <!-- contact_form -->
@endsection
