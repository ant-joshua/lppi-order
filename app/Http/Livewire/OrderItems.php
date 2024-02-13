<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class OrderItems extends Component
{

    public $items = [];
    public $products = [];
    public $total = 0;

    protected $listeners = ['priceQtyChange' => 'calculateTotal'];

    public function mount()
    {
        $this->items = [];
        $this->products = Product::get();
    }

    public function render()
    {
        return view('livewire.order-items', [
            'products' => $this->products,
            'total' => $this->total,
        ]);
    }

    public function addItem()
    {
        array_push($this->items, [
            'product_id' => null,
            'quantity' => 1,
            'price' => 0,
        ]);
    }

    public function onChangeProduct($index, $productId)
    {
        $product = $this->products->find($productId);
        $this->items[$index]['price'] = $product->price;
    }


    public function calculateTotal()
    {
        $this->total = array_reduce($this->items, function ($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        }, 0);
    }




    public function removeItem($index)
    {
        array_splice($this->items, $index, 1);

        $this->emit('priceQtyChange');

    }
}
