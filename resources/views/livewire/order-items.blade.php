<div>

    <button type="button" class="btn btn-primary" wire:click="addItem">Add Item</button>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($items as $key => $item)
            <tr>
                <td>
                    <select name="items[{{$key}}][product_id]" wire:model="items.{{$key}}.product_id" wire:change="onChangeProduct({{$key}},$event.target.value)" class="form-control">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="items[{{$key}}][quantity]" wire:model="items.{{$key}}.quantity" wire:change.lazy="$emit('priceQtyChange')" class="form-control">
                </td>
                <td>
                    <input type="number" name="items[{{$key}}][price]" wire:model="items.{{$key}}.price" wire:change.lazy="$emit('priceQtyChange')" class="form-control">
                </td>
                <td>
                    Rp.{{number_format((int)$item['quantity'] * (int)$item['price'],0,',','.')}}
                </td>
                <td>
                    <button type="button" class="btn btn-danger" wire:click="removeItem({{$key}})">Remove</button>
                </td>
            </tr>
            @endforeach

        </tbody>

        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>Rp.{{number_format($total,0,',','.')}}</td>
            </tr>
        </tfoot>
    </table>
</div>
