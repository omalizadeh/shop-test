<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                        src="{{ asset('panel-assets/images/shards-dashboards-logo.svg') }}" alt="داشبورد شاپرک">
                    <span class="d-none d-md-inline ml-1"> پنل مدیریت {{ env('WebPageName') }}</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="چیزی را جستجو کنید ..."
                aria-label="جستجو">
        </div>
    </form>

    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.index') }}">
                    <i class="material-icons">dashboard</i>
                    <span>داشبورد</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.articles.index') }}">
                    <i class="material-icons">edit</i>
                    <span>وبلاگ و مقالات</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.products.index') }}">
                    <i class="material-icons">shopping_bag</i>
                    <span>محصولات</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.brands.index') }}">
                    <i class="material-icons">branding_watermark</i>
                    <span>برندها</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.categories.index') }}">
                    <i class="material-icons">category</i>
                    <span>دسته بندی</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.feature-groups.index') }}">
                    <i class="material-icons">edit_attributes</i>
                    <span>گروه ویژگی ها</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.features.index') }}">
                    <i class="material-icons">edit_attributes</i>
                    <span>ویژگی ها</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.attribute-groups.index') }}">
                    <i class="material-icons">edit_attributes</i>
                    <span>گروه ترکیبات</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link " href="{{ route('slider.index') }}">
            <i class="material-icons">view_module</i>
            <span>اسلایدر</span>
            </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.orders.index') }}">
                    <i class="material-icons">shopping_cart</i>
                    <span>سفارشات</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.users.index') }}">
                    <i class="material-icons">people</i>
                    <span>کاربران</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link " href="{{ route('comment.index') }}">
            <i class="material-icons">person</i>
            <span>دیدگاه های کاربران</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('DashboardCustomerPage') }}">
                    <i class="material-icons">person</i>
                    <span>لیست مشتریان</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admins.messages.index') }}">
                    <i class="material-icons">message</i>
                    <span>پیام ها</span>
                </a>
            </li>
        </ul>
    </div>
</aside>