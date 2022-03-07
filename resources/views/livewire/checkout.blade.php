<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> --}}
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="checkout__form">
                <h4>HÓA ĐƠN</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tên<span>*</span></p>
                                        <input id="name" type="text" name="name" placeholder="Họ và tên"
                                            wire:model="name">
                                        @error('name')
                                            <span class="text-help text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input id="address" type="text" name="address" placeholder="Địa chỉ"
                                    wire:model="address" class="checkout__input__add">
                                @error('address')
                                    <span class="text-help text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>SĐT<span>*</span></p>
                                        <input id="phone" type="text" name="phone" placeholder="Số điện thoại"
                                            wire:model="phone">
                                        @error('phone')
                                            <span class="text-help text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input id="email" type="text" name="email" placeholder="Email"
                                            wire:model="email">
                                        @error('email')
                                            <span class="text-help text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng</h4>
                                <div class="checkout__order__products">Sản phẩm <span></span></div>
                                <ul>
                                    @foreach ($items as $item)
                                        <li>{{ $item->name }} ({{ $item->qty }})
                                            <span>{{ number_format($item->qty * $item->price) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Tổng tiền <span>{{ Cart::subtotal(0) }}</span>
                                </div>
                                <div class="checkout__order__total">Tổng tiền sau thuế
                                    <span>{{ Cart::total(0) }}</span>
                                </div>
                                <button wire:click='store' type="button" class="site-btn">ĐẶT HÀNG</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
