@extends('layouts.site')

@section('content')

    <!-- Hero Section Begin -->
    @livewire('hero', ['home' => 0] )
    <!-- Hero Section End -->

    @livewire('checkout')

@endsection
