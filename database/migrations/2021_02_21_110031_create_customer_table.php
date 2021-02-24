<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid');
            $table->string('customer_name');
            $table->string('customer_number')->nullable()->unique();
            $table->string('customer_password')->nullable()->unique();
            $table->string('customer_email')->unique();
            $table->json('wishlist')->nullable();
            $table->json('cart_items')->nullable();
            $table->string('total_orders')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
