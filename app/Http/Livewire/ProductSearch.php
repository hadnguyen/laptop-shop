<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sanpham;
use Livewire\WithPagination;
use Cart;

class ProductSearch extends Component
{
    use WithPagination;

    protected $listeners = ['updateSelection', 'updateSearch', 'updateRam', 'updateHSX'];

    protected $paginationTheme = 'bootstrap';

    public $sorts = [
        0 => 'Sắp xếp theo',
        1 => 'Giá tăng dần',
        2 => 'Giá giảm dần',
    ];

    public $sortid = 0;

    public $viewType = 'grid';

    public $selectionCatid = null;
    public $key = null;
    public $ram = null;
    public $hsx = null;
    public $minPrice;
    public $maxPrice;

    public function mount()
    {
        $this->minPrice = Sanpham::min('gia');
        $this->maxPrice = Sanpham::max('gia');
    }

    public function updateSelection($catid, $minPrice, $maxPrice)
    {
        $this->selectionCatid = $catid;
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
        $this->resetPage();
    }

    public function updateSearch($key)
    {
        $this->key = $key;
        $this->resetPage();
    }

    public function updateRam($ram)
    {
        $this->ram = $ram;
        $this->resetPage();
    }

    public function updateHSX($hsx)
    {
        $this->hsx = $hsx;
        $this->resetPage();
    }

    public function updatedSortid()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }

    public function viewFormat($viewType)
    {
        $this->viewType = $viewType;
    }

    public function store($product_id, $product_name, $product_price, $product_sale = null)
    {
        if ($product_sale) {
            Cart::add($product_id, $product_name, 1, $product_sale);
        } else {
            Cart::add($product_id, $product_name, 1, $product_price);
        }
        session()->flash('success', 'Thêm mới một mục vào rỏ hàng');
        return redirect()->route('cart')->with('success', 'Thêm mới một mục vào rỏ hàng');
    }

    public function render()
    {
        if (!is_null($this->selectionCatid)) {
            if ($this->sortid == 1) {
                if (!is_null($this->key)) {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'asc')->paginate(6);
                    } else {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'asc')->paginate(6);
                    }
                } else {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->orderBy('gia', 'asc')->paginate(6);
                    } else {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->orderBy('gia', 'asc')->paginate(6);
                    }
                }
            } elseif ($this->sortid == 2) {
                if (!is_null($this->key)) {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'desc')->paginate(6);
                    } else {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'desc')->paginate(6);
                    }
                } else {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->orderBy('gia', 'desc')->paginate(6);
                    } else {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->orderBy('gia', 'desc')->paginate(6);
                    }
                }
            } else {
                if (!is_null($this->key)) {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->paginate(6);
                    } else {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->paginate(6);
                    }
                } else {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->paginate(6);
                    } else {
                        $products = Sanpham::where('nhomsanphamid', $this->selectionCatid)
                            ->where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->paginate(6);
                    }
                }
            }
        } else {
            if ($this->sortid == 1) {
                if (!is_null($this->key)) {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'asc')->paginate(6);
                    } else {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'asc')->paginate(6);
                    }
                } else {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->orderBy('gia', 'asc')->paginate(6);
                    } else {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->orderBy('gia', 'asc')->paginate(6);
                    }
                }
            } elseif ($this->sortid == 2) {
                if (!is_null($this->key)) {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'desc')->paginate(6);
                    } else {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->orderBy('gia', 'desc')->paginate(6);
                    }
                } else {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->orderBy('gia', 'desc')->paginate(6);
                    } else {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->orderBy('gia', 'desc')->paginate(6);
                    }
                }
            } else {
                if (!is_null($this->key)) {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->paginate(6);
                    } else {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ten', 'like', '%' . $this->key . '%')
                            ->paginate(6);
                    }
                } else {
                    if ($this->selectionCatid == 1) {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->where('ram', 'like', '%' . $this->ram . '%')
                            ->where('hangsanxuat', 'like', '%' . $this->hsx . '%')
                            ->paginate(6);
                    } else {
                        $products = Sanpham::where('gia', '>=', $this->minPrice)
                            ->where('gia', '<=', $this->maxPrice)
                            ->paginate(6);
                    }
                }
            }
        }

        return view('livewire.product-search', ['products' => $products]);
    }
}
