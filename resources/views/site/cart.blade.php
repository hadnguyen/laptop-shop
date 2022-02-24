@extends('layouts.site')

@section('content')

    <!-- Hero Section Begin -->
    @livewire('hero', ['home' => 0] )
    <!-- Hero Section End -->

    <!-- Shoping Cart Section Begin -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session()->get('success') }}
        </div>
    @endif
    @livewire('shopping-cart')
    <!-- Shoping Cart Section End -->

@endsection
