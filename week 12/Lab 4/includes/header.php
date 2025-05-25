<?php
global$page;
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus | Corporate Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<!-- Sidebar -->
<nav class="sidebar">
    <div class="sidebar-brand">
        <span class="logo">Nexus</span>
    </div>
    <div class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $page == 'Dashboard' ? 'active' : '' ?>" href="dashboard.php">
                    <i class="fas fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page == 'Employees' ? 'active' : '' ?>" href="employees.php">
                    <i class="fas fa-users"></i>
                    <span>Team</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page == 'Departments' ? 'active' : '' ?>" href="departments.php">
                    <i class="fas fa-tags"></i>
                    <span>Departments</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Header -->
<header class="header">
    <div class="d-flex justify-content-between w-100 align-items-center">
        <h1 class="header-title"><?= $page ?></h1>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-light rounded-pill" type="button" id="userDropdown" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=4361ee&color=fff" class="rounded-circle me-2" width="32" height="32">
                    <span>Admin</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="auth/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="main-content">