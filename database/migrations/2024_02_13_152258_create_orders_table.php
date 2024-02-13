<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('invoice_number', 100)->nullable();
            $table->date('order_date');
            $table->string('order_status', 20)->default('pending'); // pending, processing, completed, cancelled ,refunded
            $table->bigInteger('order_total')->default(0);
            $table->text('notes')->nullable();
            $table->string('cancel_reason', 100)->nullable();

            // $table->timestamp('cancelled_at')->nullable();
            // $table->timestamp('refunded_at')->nullable();
            // $table->timestamp('returned_at')->nullable();
            // $table->timestamp('completed_at')->nullable();
            // $table->timestamp('expired_at')->nullable();


            $table->softDeletes();

            $table->index('order_date');
            $table->index('order_status');
            $table->index('payment_status');
            $table->index('shipping_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
