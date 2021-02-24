<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        for($i= 0;$i <= 20;$i++){
            ProductVariant:: insert([
                'product_variant_name' => Str::random(5), 
                'product_variant_status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => null,
            ]);
            }
        }
    }
?>
