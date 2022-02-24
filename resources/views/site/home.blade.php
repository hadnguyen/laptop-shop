@extends('layouts.site')

@section('content')
    <!-- Hero Section Begin -->
    @livewire('hero',['home' => 1])
    <!-- Hero Section End -->

    @livewire('featured-product')

@endsection
