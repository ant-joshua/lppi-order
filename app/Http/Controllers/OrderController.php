<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index()
    {
        return view('order.index');
    }

    public function create()
    {
        // $customers = User::where('role', 'customer')->get();
        $customers = User::get();

        return view('order.create', [
            'customers' => $customers,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = auth()->user()->orders()->create($request->only('customer_id', 'order_date'));

        foreach ($request->order_items as $item) {
            $order->items()->create($item);
        }

        return redirect()->route('order.index');
    }
}
