<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customerid');
            $table->foreign('customerid')->references('uid')->on('customers');
            $table->string('flatno')->nullable();
            $table->string('landmark')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('india');
            $table->integer('zipcode')->nullable();
            $table->integer('default_address')->nullable();
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
        Schema::dropIfExists('customer_address');
    }
}
