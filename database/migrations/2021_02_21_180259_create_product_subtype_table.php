<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subtype', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hsn_code')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('gst', 15, 2)->nullable();
            $table->decimal('final_price', 15, 2)->nullable();
            $table->decimal('offer_price', 15, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->string('product_subtype_status')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_variant_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_variant_id')->references('id')->on('product_variant');
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
        Schema::dropIfExists('product_subtype');
    }
}
