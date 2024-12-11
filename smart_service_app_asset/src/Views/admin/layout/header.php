<?php

use Helpers\Func;

?>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= Func::host() . '/admin/'; ?>" class="logo d-flex align-items-center">
            <img src="<?php echo Func::host(); ?>/images/logo.jpg" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['admin_full_name']; ?></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= Func::host() . '/admin/'; ?>logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

</header>