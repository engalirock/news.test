<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assests/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">مرحبا، <?= $userSession['name'] ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a class="nav-link" href="?page=home"><i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>لوحة التحكم</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=category.index"><i class="nav-icon fas fa-table"></i>
                        <p>ادارة الاقسام</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=category.add">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>اضافة قسم</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=news.index"><i class="nav-icon fas fa-table"></i>
                        <p>ادارة الاخبار</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=news.add">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>اضافة خبر</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=user.index"><i class="nav-icon fas fa-table"></i>
                        <p>ادارة المستخدمين</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="actions.php?action=logout">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>تسجيل الخروج</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>