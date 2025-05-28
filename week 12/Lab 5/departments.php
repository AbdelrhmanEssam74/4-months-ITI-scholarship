<?php
$page = 'Departments';
include 'includes/header.php';
include 'db/db_connection.php';  // Adjust this to your DB connection file

// Fetch departments data
$stmt = $conn->prepare("SELECT d.department_id, d.department_name,  
    COUNT(e.employee_id) AS items_count
    FROM departments d
    LEFT JOIN employees e ON d.department_id = e.department_id
    GROUP BY d.department_id, d.department_name");
$stmt->execute();
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid pt-5">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="header-title">Departments Management</h1>
        <div>
            <a href="add-department.php" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Department
            </a>
        </div>
    </div>
    <!-- Departments Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <?php if (!empty($_SESSION['success'])): ?>
                <div class="col-12 mb-4">
                    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Count of Employees</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($departments as $dept): ?>
                        <tr>
                            <td><div class="fw-bold"><?= htmlspecialchars($dept['department_name']) ?></div></td>
                            <td><?= htmlspecialchars($dept['items_count']) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="edit-department.php?id=<?= $dept['department_id'] ?>" class="btn btn-sm btn-light">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete-department.php?id=<?= $dept['department_id'] ?>" class="btn btn-sm btn-light" onclick="return confirm('Are you sure?')">
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

<?php include 'includes/footer.php'; ?>
