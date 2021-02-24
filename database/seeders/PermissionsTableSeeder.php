<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 22,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 27,
                'title' => 'product_create',
            ],
            [
                'id'    => 28,
                'title' => 'product_edit',
            ],
            [
                'id'    => 29,
                'title' => 'product_delete',
            ],
            [
                'id'    => 30,
                'title' => 'product_access',
            ],
            [
                'id'    => 31,
                'title' => 'sub_category_create',
            ],
            [
                'id'    => 32,
                'title' => 'sub_category_edit',
            ],
            [
                'id'    => 33,
                'title' => 'sub_category_delete',
            ],
            [
                'id'    => 34,
                'title' => 'sub_category_access',
            ],
            [
                'id'    => 35,
                'title' => 'featured_product_create',
            ],
            [
                'id'    => 36,
                'title' => 'featured_product_edit',
            ],
            [
                'id'    => 37,
                'title' => 'featured_product_show',
            ],
            [
                'id'    => 38,
                'title' => 'featured_product_delete',
            ],
            [
                'id'    => 39,
                'title' => 'featured_product_access',
            ],
            [
                'id'    => 40,
                'title' => 'offer_product_create',
            ],
            [
                'id'    => 41,
                'title' => 'offer_product_edit',
            ],
            [
                'id'    => 42,
                'title' => 'offer_product_show',
            ],
            [
                'id'    => 43,
                'title' => 'offer_product_delete',
            ],
            [
                'id'    => 44,
                'title' => 'offer_product_access',
            ],
            [
                'id'    => 45,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 46,
                'title' => 'manage_coupon_create',
            ],
            [
                'id'    => 47,
                'title' => 'manage_coupon_edit',
            ],
            [
                'id'    => 48,
                'title' => 'manage_coupon_show',
            ],
            [
                'id'    => 49,
                'title' => 'manage_coupon_delete',
            ],
            [
                'id'    => 50,
                'title' => 'manage_coupon_access',
            ],
            [
                'id'    => 51,
                'title' => 'feedback_view_show',
            ],
            [
                'id'    => 52,
                'title' => 'feedback_view_delete',
            ],
            [
                'id'    => 53,
                'title' => 'feedback_view_access',
            ],
            [
                'id'    => 54,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 55,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 56,
                'title' => 'customer_access',
            ],
            [
                'id'    => 57,
                'title' => 'manage_customer_access',
            ],
            [
                'id'    => 58,
                'title' => 'report_access',
            ],
            [
                'id'    => 59,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 60,
                'title' => 'manage_order_access',
            ],
            [
                'id'    => 61,
                'title' => 'manage_order_delete',
            ],
            [
                'id'    => 62,
                'title' => 'manage_order_show',
            ],
            [
                'id'    => 63,
                'title' => 'manage_order_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
