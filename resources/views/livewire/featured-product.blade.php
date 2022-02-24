<div>
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li data-filter=".laptop">Laptop</li>
                            <li data-filter=".ram">Ram</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($laptops as $laptop)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix laptop">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg">
                                <a href="{{ route('productdetail', $laptop->id) }}">
                                    <img src="{{ url('uploads') }}/{{ $laptop->anh }}" alt="Picture">
                                </a>
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"
                                            wire:click.prevent="store({{ $laptop->id }},'{{ $laptop->ten }}', {{ $laptop->gia }},{{ $laptop->giaban }})">
                                            <i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6>
                                    <a href="{{ route('productdetail', $laptop->id) }}">{{ $laptop->ten }}</a>
                                </h6>
                                <h5>
                                    @if ($laptop->giaban)
                                        {{ number_format($laptop->giaban, 0) }} * <del class="font-weight-light">
                                            {{ number_format($laptop->gia, 0) }} </del>
                                    @else
                                        {{ number_format($laptop->gia, 0) }}
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($rams as $ram)
                <div class="col-lg-3 col-md-4 col-sm-6 mix ram">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg">
                            <a href="{{ route('productdetail', $ram->id) }}">
                                <img src="{{ url('uploads') }}/{{ $ram->anh }}" alt="Picture">
                            </a>
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"
                                        wire:click.prevent="store({{ $ram->id }},'{{ $ram->ten }}', {{ $ram->gia }},{{ $ram->giaban }})">
                                        <i class="fa fa-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6>
                                <a href="{{ route('productdetail', $ram->id) }}">{{ $ram->ten }}</a>
                            </h6>
                            <h5>
                                @if ($ram->giaban)
                                    {{ number_format($ram->giaban, 0) }} * <del class="font-weight-light">
                                        {{ number_format($ram->gia, 0) }} </del>
                                @else
                                    {{ number_format($ram->gia, 0) }}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
</div>
