<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_admin.php">
        <div class="sidebar-brand-icon">
            <img src="image/inventory_logo.png" width="80%" />
        </div>
        <div class="sidebar-brand-text mx-3">IMS</div>
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard_admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!--<hr class="sidebar-divider d-none d-md-block">-->

    <!-- Nav Item - Admin -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin_collapse" aria-expanded="true"
            aria-controls="admin_collapse">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Admin</span>
        </a>
        <div id="admin_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin.php">New Admin</a>
                <a class="collapse-item" href="admin_manage.php">Search Admin</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Product -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product_collapse"
            aria-expanded="true" aria-controls="product_collapse">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product</span>
        </a>
        <div id="product_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add product_admin.php">New Product</a>
                <a class="collapse-item" href="view product_admin.php">Search Product</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Customer -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer_collapse"
            aria-expanded="true" aria-controls="customer_collapse">
            <i class="fas fa-fw fa-scroll"></i>
            <span>Customer</span>
        </a>
        <div id="customer_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="customer_admin.php">New Customer</a>
                <a class="collapse-item" href="customer_manage_admin.php">Search Customer</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Supplier -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#supplier_collapse"
            aria-expanded="true" aria-controls="supplier_collapse">
            <i class="far fa-user"></i>
            <span>Supplier</span>
        </a>
        <div id="supplier_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="supplier_admin.php">New Supplier</a>
                <a class="collapse-item" href="supplier_manage_admin.php">Search Supplier</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Sales -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sales_collapse" aria-expanded="true"
            aria-controls="sales_collapse">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sales</span>
        </a>
        <div id="sales_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add sale_admin.php">New Sales</a>
                <a class="collapse-item" href="view sale_admin.php">Search Sales</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->