<div>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ url('uploads') }}/{{ $product->anh }}" alt="Ảnh">
                        </div>
                        <div>

                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            {{-- @foreach (explode(',', preg_replace('/"/', '', trim($product->danhsachanh, '[]'))) as $p)
                        <img data-imgbigurl="{{ url('uploads') }}/{{ $p }}"
                            src="{{ url('uploads') }}/{{ $p }}" alt="">
                        @endforeach --}}

                            @foreach ($imgs as $img)
                                <img data-imgbigurl="{{ url('uploads') }}/{{ $img }}"
                                    src="{{ url('uploads') }}/{{ $img }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->ten }}</h3>
                        <div class="product__details__rating">
                            <div id="rateYoAvg"> </div>
                            <span>({{ $reviews->count() }} đánh giá)</span>
                        </div>
                        {{-- <div class="product__details__price">{{ number_format($product->gia) }}</div> --}}
                        <div class="product__details__price">
                            @if ($product->giaban)
                                {{ number_format($product->giaban, 0) }}₫ <del class="font-weight-light">
                                    {{ number_format($product->gia, 0) }}₫ </del>
                            @else
                                {{ number_format($product->gia, 0) }}₫
                            @endif
                        </div>

                        <a href="#"
                            wire:click.prevent="store({{ $product->id }},'{{ $product->ten }}',{{ $product->gia }},{{ $product->giaban }})"
                            class="primary-btn">Thêm vào giỏ hàng</a>
                        {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
                        @if ($product->nhomsanphamid == 1)
                            <ul>
                                <li><b>CPU:</b> <span>{{ $product->cpu }}</span></li>
                                <li><b>RAM:</b> <span>{{ $product->ram }}</span></li>
                                <li><b>Ổ cứng:</b> <span>{{ $product->ocung }}</span></li>
                                <li><b>VGA:</b> <span>{{ $product->carddohoa }}</span></li>
                                <li><b>Màn hình:</b> <span>{{ $product->manhinh }}</span></li>
                            </ul>
                        @else
                            <p>{!! $product->mota !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12" wire:ignore>
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    @if ($product->nhomsanphamid == 1)
                                        <p>{!! $product->mota !!}</p>
                                    @endif
                                    <div class="container mt-5 mb-5">
                                        {{-- Comment --}}
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                {{ session()->get('success') }}
                                            </div>

                                            {{-- <script>
                                                $(".alert").alert();
                                            </script> --}}
                                        @endif

                                        @if (session()->has('error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                        <div class="d-flex justify-content-center row">
                                            <div class="d-flex flex-column col-md-8">
                                                <div>
                                                    <span>Chọn đánh giá của bạn</span>
                                                    <div id="rateYo" style="display:inline-block"></div>
                                                </div>
                                                <div class="coment-bottom bg-white p-2 px-4">
                                                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                                                        <input type="text" class="form-control mr-3"
                                                            wire:model='comment' placeholder="Thêm bình luận...">
                                                        <button class="btn btn-primary" type="button"
                                                            wire:click.prevent='rate()'>Gửi</button>
                                                    </div>
                                                    @if ($reviews)
                                                        @foreach ($reviews as $review)
                                                            <div class="commented-section mt-2">
                                                                <div
                                                                    class="d-flex flex-row align-items-center commented-user">
                                                                    <h5 class="mr-2">
                                                                        {{ $review->user->name }}
                                                                    </h5>
                                                                    <span class="dot mb-1"
                                                                        style="height: 7px;width: 7px;margin-top: 3px;background-color: #bbb;border-radius: 50%;display: inline-block"></span>
                                                                    <p id="rateYo{{ $review->id }}"> </p>
                                                                    <span class="dot mb-1"
                                                                        style="height: 7px;width: 7px;margin-top: 3px;background-color: #bbb;border-radius: 50%;display: inline-block"></span>
                                                                    <span style="opacity: 0.4"
                                                                        class="mb-1">{{ \Carbon\Carbon::createFromTimestamp(strtotime($review->created_at))->diffForHumans(\Carbon\Carbon::now()) }}</span>
                                                                </div>
                                                                <div class="comment-text-sm">
                                                                    <span>{{ $review->comment }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm tương tự</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_product as $data)
                    <div class="col-lg-3 col-md-4 col-sm-6">

                        <div class="product__item">

                            <div class="product__item__pic">
                                <a href="{{ route('productdetail', $data->id) }}">
                                    <img src="{{ url('uploads') }}/{{ $data->anh }}">
                                </a>
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>

                            <div class="product__item__text">
                                <h6>
                                    <a href="{{ route('productdetail', $data->id) }}">{{ $data->ten }}</a>
                                </h6>
                                <h5>
                                    @if ($product->giaban)
                                        {{ number_format($product->giaban, 0) }} * <del class="font-weight-light">
                                            {{ number_format($product->gia, 0) }} </del>
                                    @else
                                        {{ number_format($product->gia, 0) }}
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
</div>

@push('scripts')
    <script>
        $(function() {
            $("#rateYoAvg").rateYo({
                rating: {{ $avg_rating }},
                starWidth: "15px",
                readOnly: true
            });
        });
    </script>
    <script>
        $(function() {
            $("#rateYo").rateYo({
                rating: 0,
                fullStar: true,
                starWidth: "15px"
            }).on("rateyo.set", function(e, data) {
                Livewire.emit('storeRating', `${data.rating}`, '{{ $product->id }}');
            });
        });
    </script>
    @foreach ($reviews as $review)
        <script>
            $(function() {
                $("#rateYo{{ $review->id }}").rateYo({
                    rating: {{ $review->rating }},
                    starWidth: "15px",
                    readOnly: true
                });
            });
        </script>
    @endforeach
@endpush
