<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\m_product;

class Addproduct extends Component {

    public $count = 0;
    public $product; // store all product data
    public $productid;
    public $productname = null;
    public $unitprice = null;

    public function increment()
    {
        $this->count++;
    }

    public function mount()
    {
        $this->product = m_product::all();
    }

    public function render()
    {
        return view('livewire.addproduct');
    }

    public function updatedProductid()
    {
        //update var productname dan unit price jika value product id berubah
        $product = m_product::where('id', $this->productid)->first();
        $this->productname = $product->productname;
        $this->unitprice = $product->unitprice;
    }

}
