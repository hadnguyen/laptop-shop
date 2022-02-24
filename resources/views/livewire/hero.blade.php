<div>
    <!-- Hero Section Begin -->
    <section @class(['hero', 'hero-normal' => $home == 0])>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>DANH MỤC SẢN PHẨM</span>
                        </div>
                        <ul>
                            @foreach ($nhomsanpham as $nsp)
                                <li><a href="#">{{ $nsp->ten }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    TÌM KIẾM
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" id="key" name="key" wire:model="key" placeholder="Nhập tên sản phẩm">
                                <button wire:click.prevent="search" type="button" class="site-btn fa fa-search"></button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <a href="tel:19001900"><i class="fa fa-phone"></i></a>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>1900.1900</h5>
                                <span style="color: #1C5D99; font-weight:bold">hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    @if ($home == 1)
                        {{-- <div class="hero__item set-bg" data-setbg="{{ url('site') }}/img/hero/banner.jpg">
                        </div> --}}
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a href="{{ route('productdetail', $sanpham->id = 6) }}">
                                        <img class="d-block w-100" src="{{ url('site') }}/img/carousel/carousel1.png" alt="First slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="{{ route('productdetail', $sanpham->id = 10) }}">
                                        <img class="d-block w-100" src="{{ url('site') }}/img/carousel/carousel2.jpg" alt="Second slide">
                                    </a>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>

@push('scripts')
    <script>
        document.getElementById('key').onkeypress = function(e) {
        if (e.which === 13){
            @this.call('search');
            e.preventDefault();
        }
    }
    </script>
@endpush
