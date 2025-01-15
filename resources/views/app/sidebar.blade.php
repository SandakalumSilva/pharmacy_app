<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">MyPharmacy</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('dashboard') }}">General Dashboard</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-fire"></i><span>POS</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('pos') }}">POS</a></li>
                </ul>
            </li>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.category') }}">All Category</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Products</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.product') }}">All Products</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Suppliers</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.supplier') }}">All Suppliers</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Purchase</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.purchase') }}">All Purchase</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Stock</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.stock') }}">All Stocks</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Expenses</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.expense') }}">All Expenses</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('all.users') }}">All Users</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
