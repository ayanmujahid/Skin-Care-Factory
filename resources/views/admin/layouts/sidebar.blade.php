<!-- Theme Customization Structure End -->
<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('admin.dashboard.index') }}" class="sidebar-logo">
            <img src="{{ asset('admin/images/logo.webp') }}" alt="site logo" class="light-logo">
            <img src="assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">.
            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Inventory Management</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:cube-outline" class="menu-icon"></iconify-icon>
                    <span>Product Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.products.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Product List</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.create') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add
                            Product</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:tag-outline" class="menu-icon"></iconify-icon>
                    <span>Product Catagory Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.product-categories.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Catagory List</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product-categories.create') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add
                            Catagory</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brands.index') }}"><i
                                class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Vender</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product-subcategories.index') }}"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Sub-Catagory</a>
                    </li>
                    {{-- <li>
                        <a href="index-4.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Cryptocurrency</a>
                    </li> --}}
                </ul>
            </li>

            <li class="sidebar-menu-group-title">Order Management</li>
            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <iconify-icon icon="mdi:cart-outline" class="menu-icon"></iconify-icon>
                    <span>All Orders</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.status', 'delivered') }}">
                    <iconify-icon icon="mdi:package-variant-closed" class="menu-icon"></iconify-icon>
                    <span>Delivered Orders</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.status', 'pending') }}">
                    <iconify-icon icon="mdi:clock-outline" class="menu-icon"></iconify-icon>
                    <span>Pending Orders</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.status', 'cancelled') }}">
                    <iconify-icon icon="mdi:cancel" class="menu-icon"></iconify-icon>
                    <span>Cancelled Orders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.status', 'returned') }}">
                    <iconify-icon icon="mdi:backup-restore" class="menu-icon"></iconify-icon>
                    <span>Returned Orders</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Professional Management</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:license" class="menu-icon"></iconify-icon>
                    <span>License Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.licenses.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            License List
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.licenses.status', 1) }}">
                            <i class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            Approved License
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.licenses.status', 0) }}">
                            <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Pending License
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.licenses.status', 2) }}">
                            <i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Rejected License
                        </a>
                    </li>
                </ul>
            </li>


            
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Company</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Notification</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Notification Alert</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Theme</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Currencies</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Languages</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Payment
                            Gateway</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<style>
    .fa-solid,
    .fas {
        font-weight: 900;
        margin-right: 15px !important;
    }
</style>
