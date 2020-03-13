@extends('front.layouts.inchalam')
@section('customMdbStyle')
{{-- Material Design Bootstrap --}}
<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
@endsection
@section('head')
@include('front.includes.head')
@endsection
@section('navbar')
@include('front.includes.navbar')
@endsection
@section('content')
    {{--Sliders--}}
        @include('front.pages.slide')
    {{--/fin Sliders--}}
    {{--Categories--}}
        @include('front.pages.categories')
    {{--/fin Categories--}}
    {{--HowWork--}}
        @include('front.pages.how-work')
    {{--/fin HowWork--}}
    {{--Profit--}}
        @include('front.pages.profit')
    {{--/fin Profit--}}
    {{--Products--}}
        @include('front.pages.products')
    {{--/fin Products--}}
@endsection
@section('footer')
    @include('front.includes.footer')
@endsection