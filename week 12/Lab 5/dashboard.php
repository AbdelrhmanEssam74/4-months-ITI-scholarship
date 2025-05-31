<?php
include 'includes/header.php';
$page = "Dashboard";
require_once  'vendor/autoload.php';
use Controllers\Employees;

$emp = new Employees();
$employeeCount = count($emp->read());

$departmentCount = 5;


?>
<div class="container-fluid pt-5">
    <!-- Metrics -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-6">
            <div class="metric-card">
                <div class="icon primary">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div class="value"><?= $employeeCount ?></div>
                <div class="label">Total Employees</div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="metric-card">
                <div class="icon success">
                    <i class="fas fa-project-diagram fa-lg"></i>
                </div>
                <div class="value"><?= $departmentCount ?></div>
                <div class="label">Total Departments</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Quick Actions</h5>
                    <div class="row g-3">
                        <div class="col-md-6 col-6">
                            <a href="add-employee.php"
                               class="btn btn-light w-100 py-3 d-flex flex-column align-items-center">
                                <i class="fas fa-user-plus fa-2x mb-2 text-primary"></i>
                                <span>Add Employee</span>
                            </a>
                        </div>
                        <div class="col-md-6 col-6">
                            <a href="add-department.php"
                               class="btn btn-light w-100 py-3 d-flex flex-column align-items-center">
                                <i class="fas fa-tag fa-2x mb-2 text-success"></i>
                                <span>Add Category</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Mobile sidebar toggle
    document.addEventListener('DOMContentLoaded', function () {
        // Highlight active nav item
        const currentPage = "<?= $page ?>";
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.textContent.trim() === currentPage) {
                link.classList.add('active');
            }
        });

        // You would add sidebar toggle functionality here
        // when implementing the mobile menu button
    });
</script>
</body>
</html>