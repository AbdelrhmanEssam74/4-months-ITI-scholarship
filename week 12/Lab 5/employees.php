<?php

require_once  'vendor/autoload.php';
$page = 'Employees';
include 'includes/header.php';
use Controllers\Employees;
$employees = new Employees();
$employees = $employees->read();


?>

    <div class="container-fluid pt-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="header-title">Employees Management</h1>
            <div>
                <a href="add-employee.php" class="btn btn-primary">
                    <i class="fas fa-user-plus me-2"></i>Add Employee
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <?php if (!empty($_SESSION['not-found'])): ?>
                    <div class="col-12 mb-4">
                        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['not-found']) ?></div>
                    </div>
                    <?php unset($_SESSION['not-found']); ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="col-12 mb-4">
                        <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['danger']) || !empty($_SESSION['failed']) ): ?>
                    <div class="col-12 mb-4">
                        <div class="alert alert-warning"><?= htmlspecialchars($_SESSION['danger'])
                            ?: htmlspecialchars($_SESSION['failed'])
                            ?></div>
                    </div>
                    <?php unset($_SESSION['danger']); ?>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="50px"></th>
                            <th>Employee</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Salary</th>
                            <th>Hire Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employees as $emp): ?>
                            <?php

                            $profilePic = !empty($emp['profile_picture'])
                                ?  htmlspecialchars($emp['profile_picture'])
                                : 'https://ui-avatars.com/api/?name=' . urlencode($emp['first_name'] . ' ' . $emp['last_name']) . '&background=999&color=fff';
                            ?>
                            <tr>
                                <td>
                                    <img src="assets/uploads/<?= $profilePic ?>"
                                         class="rounded-circle"
                                         width="40" height="40"
                                         alt="<?= htmlspecialchars($emp['first_name'] . ' ' . $emp['last_name']) ?>">
                                </td>
                                <td>
                                    <div class="fw-bold"><?= htmlspecialchars($emp['first_name'] . ' ' . $emp['last_name']) ?></div>
                                    <small class="text-muted"><?= htmlspecialchars($emp['email']) ?></small>
                                </td>
                                <td><?= htmlspecialchars($emp['position']) ?></td>
                                <td><?= htmlspecialchars($emp['department_name']) ?></td>
                                <td>
                                    <?= htmlspecialchars($emp['salary']) ?>
                                </td>
                                <td><?= date('d M Y', strtotime($emp['hire_date'])) ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="edit-employee.php?id=<?= $emp['employee_id'] ?>"
                                           class="btn btn-sm btn-light">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="src/backend/delete-emp.php?id=<?= $emp['employee_id'] ?>"
                                           class="btn btn-sm btn-light">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
include 'includes/footer.php';
