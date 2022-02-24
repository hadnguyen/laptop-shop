<div>
    <div class="latest-product__text" wire:ignore>
        <h4>Sản phẩm mới</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">
                @foreach (range(0, 3) as $i)
                    <a href="{{ route('productdetail', $products[$i]['id']) }}" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="{{ url('uploads') }}/{{ $products[$i]['anh'] }}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{ Str::limit($products[$i]['ten'], 30, $end = '...') }}</h6>
                            @if ($products[$i]['giaban'] > 0)
                                <span>{{ number_format($products[$i]['giaban'], 0) }}₫</span>
                            @else
                                <span>{{ number_format($products[$i]['gia'], 0) }}₫</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>


            <div class="latest-prdouct__slider__item">
                @foreach (range(3, 5) as $i)
                    <a href="{{ route('productdetail', $products[$i]['id']) }}" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="{{ url('uploads') }}/{{ $products[$i]['anh'] }}" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{ Str::limit($products[$i]['ten'], 30, $end = '...') }}</h6>
                            @if ($products[$i]['giaban'] > 0)
                                <span>{{ number_format($products[$i]['giaban'], 0) }}₫</span>
                            @else
                                <span>{{ number_format($products[$i]['gia'], 0) }}₫</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
