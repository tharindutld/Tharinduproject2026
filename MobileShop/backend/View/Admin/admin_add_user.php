<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../Common/header.php' ?>
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/Admin/admin_add_user.css">
</head>
<body>

<div class="d-flex" id="wrapper">
    <div class="bg-dark border-right sidebar-container" id="sidebar-wrapper">
        <?php include '../../Common/sidebar.php'; ?>
    </div>

    <div id="page-content-wrapper" class="w-100 bg-light form">
        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card shadow-sm border-0 mt-3">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0"><i class="bi bi-person-plus me-2"></i>Add New Staff Member</h5>
                        </div>
                        <div class="card-body p-4">
                            
                            <form id="userRegistrationForm" action="../../Controllers/Admin/admin_add_user.php" method="POST" novalidate>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" minlength="3" pattern="[A-Za-z\s]+" title="First name must be at least 3 letters and contain only alphabets." oninput="checkFirstname(this)" required> 
                                        <div class="invalid-feedback">Please enter a first name.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" disabled placeholder="Enter last name" minlength="3" pattern="[A-Za-z\s]+" title="Last name must be at least 3 letters and contain only alphabets." oninput="checkLastname(this)" required> 
                                        <div class="invalid-feedback">Please enter a last name.</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" disabled name="email" placeholder="example@mail.com" oninput="checkEmail(this)" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone" disabled name="phone" pattern="[0-9]{10}" placeholder="07xxxxxxxx" title="Phone number must be 10 digits only." oninput="checkPhone(this)" required>
                                        <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select class="form-select" id="gender" disabled name="gender" oninput="checkGender(this)" required>
                                            <option value="" selected disabled>Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a gender.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthDate" class="form-label">Birth Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="birthdate" disabled name="birthdate" max="2010-03-08" onchange="checkBirthDate(this)" required>
                                        <div class="invalid-feedback">Please select a birth date.</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                        <select class="form-select" id="role" name="role" disabled oninput="checkRole(this)" required>
                                            <option value="" selected disabled>Choose...</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                            <option value="User">Standard User</option>
                                        </select>
                                        <div class="invalid-feedback">Please assign a role.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" id="status" name="status" disabled oninput="checkStatus(this)" required>
                                             <option value="" selected disabled>Choose...</option>
                                            <option value="Active" >Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        <div class="invalid-feedback">Please select an account status.</div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" disabled oninput="checkPassword(this)" minlength="8" placeholder="At least 8 characters" required>
                                        <div class="invalid-feedback">Password must be 8+ chars with Uppercase, Lowercase, and a Special Character (@#$%).</div>
                                    </div>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-end gap-2">
                                    <button  type="button" onclick="resetForm()" id="resetBtn" class="btn btn-outline-secondary px-4">Clear Form</button>
                                    <button  type="submit" id="submitBtn" class="btn btn-primary px-4">Create User</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../Script/Admin/admin_add_user.js"></script>
</body>
</html>