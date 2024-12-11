<?php use Helpers\Func; ?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= Func::host() . '/admin/'; ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#patient-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-heart-pulse"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="patient-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li><a href="<?= Func::host() . '/admin/'; ?>register-patient"><i class="bi bi-circle"></i><span>Register Patient</span></a></li>
                <li><a href="<?= Func::host() . '/admin/'; ?>manage-patient"><i class="bi bi-circle"></i><span>Manage Patient</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#patient-session-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-medical"></i><span>Patient Session</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="patient-session-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li><a href="<?= Func::host() . '/admin/'; ?>new-session"><i class="bi bi-circle"></i><span>New Session</span></a></li>
                <li><a href="<?= Func::host() . '/admin/'; ?>manage-session"><i class="bi bi-circle"></i><span>Manage Session</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#facility-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-house-door"></i><span>Facilities</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="facility-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li><a href="<?= Func::host() . '/admin/'; ?>new-facility"><i class="bi bi-circle"></i><span>New Facility</span></a></li>
                <li><a href="<?= Func::host() . '/admin/'; ?>manage-facility"><i class="bi bi-circle"></i><span>Manage Facility</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li><a href="<?= Func::host() . '/admin/'; ?>new-admin"><i class="bi bi-circle"></i><span>New Admin</span></a></li>
                <li><a href="<?= Func::host() . '/admin/'; ?>manage-admins"><i class="bi bi-circle"></i><span>Manage Admins</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= Func::host() . '/admin/'; ?>logout">
                <i class="bi bi-box-arrow-right"></i><span>Log Out</span>
            </a>
        </li>
    </ul>

</aside>