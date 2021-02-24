<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_no');
            $table->string('customer_id');
            $table->string('address');
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->decimal('total_discount', 15, 2)->nullable();
            $table->decimal('total_deliveryamt', 15, 2);
            $table->integer('total_item');
            $table->integer('total_item_qty');
            $table->string('order_status')->comment('1:processing,2:out for delivery,3:delivered');
            $table->string('payment_status')->comment('0:Paid, 1:Cod');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
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
}
