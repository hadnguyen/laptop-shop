<div>
    <div class="sidebar">
        <div class="sidebar__item">
            <h4>Nhóm sản phẩm</h4>
            <ul>
                @foreach ($categories as $category)
                    <li><a href="#" onclick="hideFilter()" wire:click.prevent="selectCategory({{ $category->id }})">
                            @if ($category->id == $this->selectionCatid)
                                <span class="cate-change">{{ $category->ten }}
                                    ({{ $category->sanphams->count() }})
                                </span>
                            @else
                                <span class="cate-select">{{ $category->ten }}
                                    ({{ $category->sanphams->count() }})</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar__item" wire:ignore>
            <h4>Lọc theo giá</h4>
            <div class="price-range-wrap">
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                    data-min="{{ $pMin }}" data-max="{{ $pMax }}">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
                <div class="range-slider">
                    <div class="price-input">
                        <input type="text" id="minamount" class="number-separator">
                        <input type="text" id="maxamount" class="number-separator">
                    </div>
                </div>
            </div>
        </div>
        @if ($this->selectionCatid == 1)
            <div>
                <div class="sidebar__item">
                    <h4 style="margin-bottom:0px;">Hãng sản xuất</h4>
                    <hr style="margin: 10px 0px;border: 2px solid #1c5d99;">

                    <select id="hsx">
                        <option value="" selected>Hãng sản xuất</option>
                        <option value="Asus">Asus</option>
                        <option value="Apple">Apple</option>
                        <option value="Lenovo">Lenovo</option>
                        <option value="MSI">MSI</option>
                    </select>
                </div>
                <div class="sidebar__item">
                    <h4 style="margin-bottom:0px;">RAM</h4>
                    <hr style="margin: 10px 0px;border: 2px solid #1c5d99;">

                    <select id="ram">
                        <option value="" selected>Ram</option>
                        <option value="8GB">8GB</option>
                        <option value="16GB">16GB</option>
                    </select>
                </div>
            </div>
        @else
            <div id="hide-filter" style="display:none;">
                <div class="sidebar__item">
                    <h4 style="margin-bottom:0px;">Hãng sản xuất</h4>
                    <hr style="margin: 10px 0px;border: 2px solid #1c5d99;">

                    <select id="hsx">
                        <option value="" selected>Hãng sản xuất</option>
                        <option value="Asus">Asus</option>
                        <option value="Apple">Apple</option>
                        <option value="Lenovo">Lenovo</option>
                        <option value="MSI">MSI</option>
                    </select>
                </div>
                <div class="sidebar__item">
                    <h4 style="margin-bottom:0px;">RAM</h4>
                    <hr style="margin: 10px 0px;border: 2px solid #1c5d99;">

                    <select id="ram">
                        <option value="" selected>Ram</option>
                        <option value="8GB">8GB</option>
                        <option value="16GB">16GB</option>
                    </select>
                </div>
            </div>
        @endif
    </div>
    @livewire('latest-product')
</div>

@push('scripts')
    <script type="text/javascript">
        function update_price(minPrice, maxPrice) {
            @this.call('updatePrice', minPrice, maxPrice);
        }

        function hideFilter() {
            document.getElementById('hide-filter').style.display = "none";
        }
    </script>

    <script>
        $(function() {
            $("#ram").on('change', function(e) {
                e.preventDefault();
                @this.set('ram', e.target.value);
            });
        });

        $(function() {
            $("#hsx").on('change', function(e) {
                e.preventDefault();
                @this.set('hsx', e.target.value);
            });
        });
    </script>
@endpush
