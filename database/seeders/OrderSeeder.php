<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Order;
use Carbon\Carbon;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i= 0;$i <= 20;$i++){
        Order:: insert([
            'bill_no' => Str::random(5) .' - '. rand(5,66), 
            'customer_id' => rand(10,20000),
            'address' => 'home',
            'total_amount' => 100,
            'total_discount' => null,
            'total_deliveryamt' => 20,
            'total_item' => 5,
            'total_item_qty' => 8,
            'order_status' => 1,
            'payment_status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => null,
        ]);
        }
    }
}
