@extends('layouts.site')

@section('content')

    <!-- Hero Section Begin -->
    @livewire('hero',['home' => 0])
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    @livewire('select-condition')
                </div>
                <div class="col-lg-9 col-md-7">
                    @livewire('product-search')
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
