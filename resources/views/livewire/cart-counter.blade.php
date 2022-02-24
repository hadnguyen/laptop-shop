<div>
    <div class="header__cart">
        <ul>
            @if (Auth::check())
                <li><a href="{{ route('order') }}"><i class="fa fa-truck"></i> <span>{{ $order_count }}</span></a></li>
            @else
                <li><a id="truck-click" href="#"><i class="fa fa-truck"></i> <span>{{ $order_count }}</span></a></li>
            @endif
            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li> --}}
            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::count() }}</span></a></li>
        </ul>
        <div class="header__cart__price">Tổng: <span>{{ Cart::total() }}</span></div>
    </div>
</div>

@push('scripts')
    <script>
        let btn = document.getElementById("truck-click");
        btn.addEventListener("click", function() {
            alert("Đăng nhập để xem đơn hàng!");
        });
    </script>
@endpush
