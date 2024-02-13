<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Orders</h3>
                <p class="text-subtitle text-muted">Create Order</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Order</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-content p-3">
            <h5 class="card-title">Create Order</h5>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="customer_id" class="form-label required">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="order_date" class="form-label required">Order Date</label>
                    <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date') }}">
                </div>
                <livewire:order-items />

                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>

</x-app-layout>


