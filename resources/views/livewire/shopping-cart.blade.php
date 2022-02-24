<div>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ url('uploads') }}/{{ App\Models\Sanpham::find($item->id)->anh }}"
                                                width="100px" alt="">
                                            <h5>{{ $item->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format($item->price, 0) }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <span class="dec qtybtn"
                                                        wire:click="quantityreduce('{{ $item->rowId }}')">-</span>
                                                    <input type="text" value="{{ $item->qty }}"
                                                        wire:change.prevent="quantitychange('{{ $item->rowId }}',$event.target.value)">
                                                    <span class="inc qtybtn"
                                                        wire:click="quantityincrease('{{ $item->rowId }}')">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ $item->subtotal(0) }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close"
                                                wire:click.prevent="delete('{{ $item->rowId }}')"></span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop') }}" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="#">
                                <input type="text" placeholder="Mã giảm giá">
                                <button type="submit" class="site-btn">Áp dụng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        {{-- <h5>Giỏ hàng</h5> --}}
                        <ul>
                            <li>Tạm tính <span>{{ Cart::subtotal(0) }}</span></li>
                            <li>Thuế VAT <span>{{ Cart::tax(0) }}</span></li>
                            <li>Thành tiền <span>{{ Cart::total(0) }}</span></li>
                        </ul>
                        @if (!$items->isEmpty())
                            <a href="{{ route('checkout') }}" class="primary-btn">Tiến hành đặt hàng</a>
                        @else
                            <a href="#" id="product-empty" class="primary-btn">Tiến hành đặt hàng</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@push('scripts')
    <script>
        let err = document.getElementById("product-empty");
        err.addEventListener("click", function() {
            alert("Chưa có sản phẩm!");
        });
    </script>
@endpush
