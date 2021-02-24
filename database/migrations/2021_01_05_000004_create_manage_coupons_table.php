<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('manage_coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon_code')->unique();
            $table->decimal('coupon_value', 15, 2);
            $table->string('coupon_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
