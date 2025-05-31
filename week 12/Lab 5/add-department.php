<?php
include 'includes/header.php';
?>
    <div class="container-fluid pt-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="header-title">Add New Department</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="departments.php">Departments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Department</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form id="addDepartmentForm" action="src/backend/addDept.php" method="POST">
                            <div class="mb-4">
                                <h5 class="mb-3">Department Details</h5>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="DepartmentName" class="form-label">Department Name <span class="text-danger">*</span></label>
                                        <input
                                                type="text"
                                                name="department_name"
                                                class="form-control"
                                                id="DepartmentName"
                                                value=""
                                        >
                                        <div class="text-danger small mt-1">
                                            <?= $_SESSION['errors']['department_name'] ?? '' ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="DepartmentDescription" class="form-label">Description</label>
                                        <textarea
                                                name="department_description"
                                                class="form-control"
                                                id="DepartmentDescription"
                                                rows="3"
                                        ></textarea>
                                        <div class="text-danger small mt-1">
                                            <?= $_SESSION['errors']['department_description'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 border-top">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="departments.php" class="btn btn-light">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Department
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Help -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="mt-4">
                            <h6>Quick Actions</h6>
                            <div class="d-grid gap-2">
                                <a href="departments.php" class="btn btn-outline-secondary">
                                    <i class="fas fa-list me-2"></i>View All Departments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include 'includes/footer.php';