<?php
include 'includes/header.php';

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
$page = 'Add Employee';

?>
    <div class="container-fluid pt-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="header-title">Add New Employee</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="employees.php">Employees</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form id="addEmployeeForm" method="post" enctype="multipart/form-data" action="backend/addEmp.php">
                            <div class="row g-3">
                                <!-- Personal Information -->
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value=""   >
                                    <span class="text-danger"><?= $errors['firstName'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value=""   >
                                    <span class="text-danger"><?= $errors['lastName'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value=""   >
                                    <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="">
                                    <span class="text-danger"><?= $errors['phone'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="">
                                    <span class="text-danger"><?= $errors['dob'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="text-danger"><?= $errors['gender'] ?? '' ?></span>
                                </div>
                                <div class="col-12 mt-4 pt-3 border-top">
                                    <h5 class="mb-3">Employment Information</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-select" id="department" name="department"   >
                                        <option value="">Select Department</option>
                                        <option value="1">IT</option>
                                        <option value="2">Human Resources</option>
                                        <option value="3">Finance</option>
                                        <option value="4" >Marketing</option>
                                        <option value="5" >Sales</option>
                                        <option value="6" >Operations</option>
                                    </select>
                                    <span class="text-danger"><?= $errors['department'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" value=""   >
                                    <span class="text-danger"><?= $errors['position'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="hireDate" class="form-label">Hire Date</label>
                                    <input type="date" class="form-control" id="hireDate" name="hireDate" value=""   >
                                    <span class="text-danger"><?= $errors['hireDate'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="salary" class="form-label">Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="salary" name="salary" step="0.01" value="">
                                    </div>
                                    <span class="text-danger"><?= $errors['salary'] ?? '' ?></span>
                                </div>
                                <div class="col-12 mt-4 pt-3 border-top">
                                    <h5 class="mb-3">Address Information</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="streetAddress" class="form-label">Street Address</label>
                                    <input type="text" class="form-control" id="streetAddress" name="streetAddress" value="">
                                    <span class="text-danger"><?= $errors['streetAddress'] ?? '' ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="">
                                    <span class="text-danger"><?= $errors['city'] ?? '' ?></span>
                                </div>
                                <div class="col-md-12">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="">
                                    <span class="text-danger"><?= $errors['country'] ?? '' ?></span>
                                </div>
                                <div class="col-md-12">
                                    <label for="profilePhoto" class="form-label">Profile Photo</label>
                                    <input class="form-control" type="file" id="profilePhoto" name="profilePhoto" accept="image/*">
                                    <span class="text-danger"><?= $errors['profilePhoto'] ?? '' ?></span>
                                </div>

                                <!-- Form Actions -->
                                <div class="col-12 mt-4 pt-3 border-top">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-light">Cancel</button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Save Employee
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Side Help Card -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Adding New Employees</h5>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Complete all    <field></field>s to add a new employee to the system.
                        </div>
                        <div class="mt-4">
                            <h6>Quick Actions</h6>
                            <div class="d-grid gap-2">
                                <a href="employees.php" class="btn btn-outline-secondary">
                                    <i class="fas fa-users me-2"></i>View All Employees
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
