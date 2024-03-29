<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public int $count = 0;

    public function render()
    {
        return view('livewire.counter', [
            'count' => $this->count,
        ]);
    }


    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--;
        }

    }
}
