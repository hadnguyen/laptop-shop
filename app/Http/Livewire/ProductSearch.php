<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sanpham;
use Livewire\WithPagination;
use Cart;

class ProductSearch extends Component
{
    use WithPagination;

    protected $listeners = ['updateSelection', 'updateRam', 'updateHSX'];

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
        $this->key = $_GET['key'];
    }

    public function updateSelection($catid, $minPrice, $maxPrice)
    {
        $this->selectionCatid = $catid;
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
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
        $query = new Sanpham();

        if ($this->key) {
            $query = $query->where('ten', 'like', '%' . $this->key . '%');
        }
        if ($this->selectionCatid) {
            $query = $query->where('nhomsanphamid', $this->selectionCatid);
        }
        if ($this->hsx) {
            $query = $query->where('hangsanxuat', 'like', '%' . $this->hsx . '%');
        }
        if ($this->ram) {
            $query = $query->where('ram', 'like', '%' . $this->ram . '%');
        }
        if ($this->sortid == 1) {
            $query = $query->orderBy('gia', 'asc');
        }
        if ($this->sortid == 2) {
            $query = $query->orderBy('gia', 'desc');
        }

        $query = $query->where('gia', '>=', $this->minPrice)
            ->where('gia', '<=', $this->maxPrice);

        $products = $query->paginate(6);

        return view('livewire.product-search', ['products' => $products]);
    }
}
