<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController', ['except' => ['show']]);

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController', ['except' => ['show']]);

    // Sub Categories
    Route::post('sub-categories/media', 'SubCategoriesApiController@storeMedia')->name('sub-categories.storeMedia');
    Route::apiResource('sub-categories', 'SubCategoriesApiController', ['except' => ['show']]);

    // Featured Products
    Route::apiResource('featured-products', 'FeaturedProductsApiController');

    // Offer Products
    Route::apiResource('offer-products', 'OfferProductsApiController');

    // Manage Coupons
    Route::apiResource('manage-coupons', 'ManageCouponsApiController');

    // Feedback Views
    Route::apiResource('feedback-views', 'FeedbackViewApiController', ['except' => ['store', 'update']]);
});
