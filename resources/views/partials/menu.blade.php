<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
                <li class="{{ request()->is("admin/manage-banner") || request()->is("admin/manage-banner/*") ? "active" : "" }}">
                    <a href="{{ route("admin.manage-banner.index") }}">
                        <i class="fa-fw fas fa-luggage-cart">

                        </i>
                        <span>{{ trans('cruds.bannerslider.title') }}</span>

                    </a>
                </li>
            @can('product_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-shopping-cart">

                        </i>
                        <span>{{ trans('cruds.productManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('product_category_access')
                            <li class="{{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-categories.index") }}">
                                    <i class="fa-fw fas fa-box-open">

                                    </i>
                                    <span>{{ trans('cruds.productCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan

                        @can('sub_category_access')
                            <li class="{{ request()->is("admin/sub-categories") || request()->is("admin/sub-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sub-categories.index") }}">
                                    <i class="fa-fw fas fa-box-open">

                                    </i>
                                    <span>{{ trans('cruds.subCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan

                            <li class="{{ request()->is("admin/brand") || request()->is("admin/brand/*") ? "active" : "" }}">
                                <a href="{{ route("admin.brand.index") }}">
                                    <i class="fa-fw fas fa-box-open">

                                    </i>
                                    <span>{{ trans('cruds.brand.title') }}</span>

                                </a>
                            </li>

                        @can('product_access')
                            <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>

                                </a>
                            </li>
                        @endcan

                            <li class="{{ request()->is("admin/productvariant") || request()->is("admin/productvariant/*") ? "active" : "" }}">
                                <a href="{{ route("admin.productvariant.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.productvariant.title') }}</span>

                                </a>
                            </li>

                            <li class="{{ request()->is("admin/productsubtype") || request()->is("admin/productsubtype/*") ? "active" : "" }}">
                                <a href="{{ route("admin.productsubtype.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.productsubtype.title') }}</span>

                                </a>
                            </li>

                        @can('featured_product_access')
                            <li class="{{ request()->is("admin/featured-products") || request()->is("admin/featured-products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.featured-products.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.featuredProduct.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('offer_product_access')
                            <li class="{{ request()->is("admin/offer-products") || request()->is("admin/offer-products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.offer-products.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.offerProduct.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="{{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-tags.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('coupon_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-box">

                        </i>
                        <span>{{ trans('cruds.coupon.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('manage_coupon_access')
                            <li class="{{ request()->is("admin/manage-coupons") || request()->is("admin/manage-coupons/*") ? "active" : "" }}">
                                <a href="{{ route("admin.manage-coupons.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.manageCoupon.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('customer_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-user-friends">

                        </i>
                        <span>{{ trans('cruds.customer.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('manage_customer_access')
                            <li class="{{ request()->is("admin/manage-customers") || request()->is("admin/manage-customers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.manage-customers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.managecustomer.title') }}</span>
                                    <span class="pull-right-container"></span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('manage_order_access')
                <li class="{{ request()->is("admin/manage-orders") || request()->is("admin/manage-orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.manage-orders.index") }}">
                        <i class="fa-fw fas fa-luggage-cart">

                        </i>
                        <span>{{ trans('cruds.manageOrder.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('feedback_view_access')
                <li class="{{ request()->is("admin/feedback-views") || request()->is("admin/feedback-views/*") ? "active" : "" }}">
                    <a href="{{ route("admin.feedback-views.index") }}">
                        <i class="fa-fw fas fa-comments">

                        </i>
                        <span>{{ trans('cruds.feedbackView.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('report_access')
                <li class="{{ request()->is("admin/reports") || request()->is("admin/reports/*") ? "active" : "" }}">
                    <a href="{{ route("admin.reports.index") }}">
                        <i class="fa-fw far fa-chart-bar">

                        </i>
                        <span>{{ trans('cruds.report.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>
