<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_no');
            $table->unsignedBigInteger('orders_id');
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('payment_id');
            $table->string('order_id');
            $table->string('bank');
            $table->integer('amount');
            $table->string('email');
            $table->string('number');
            $table->string('method');
            $table->string('signature_hash');
            $table->string('status');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('orders_payment');
    }
}
