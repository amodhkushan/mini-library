<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background: #f8faf9; }
        .form-control, .form-select { border-radius: 10px; background-color: #f8faf9; border: 1px solid #e7ece8; padding: 0.8rem 1rem; }
        .form-control:focus, .form-select:focus { box-shadow: none; border-color: #728C63; }
        .theme-btn { background: #728C63; color: #fff; border: none; border-radius: 999px; padding: 0.75rem 1.5rem; }
        .theme-btn:hover { background: #5f7d56; color: #fff; }
        .outline-btn { background: #fff; color: #6b7280; border: 1px solid #e2e8f0; border-radius: 999px; padding: 0.75rem 1.5rem; }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="card border-0 shadow-sm" style="border-radius: 12px; background-color: #fff;">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: #E2E8F0 !important;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-plus me-2 fs-5" style="color: #728C63;"></i>
                    <h5 class="fw-bold mb-0" style="color: #2d3a2f;">Register New User</h5>
                </div>
                <a href="directory.php" class="text-decoration-none small fw-bold" style="color: #728C63;">
                    Member Directory <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>

            <div class="card-body p-4">
                <form action="../../src/Controllers/AddUserController.php" method="POST" enctype="multipart/form-data">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Priyantha Silva" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="e.g. LIB-2026-001" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">NIC Number</label>
                            <input type="text" name="nic" class="form-control" placeholder="e.g. 199512345678" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="e.g. member@example.com" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="********" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Role</label>
                            <select name="roleid" class="form-select" required>
                                <option value="" selected disabled>Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Librarian</option>
                                <option value="3">Student</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted">Upload Profile Picture</label>
                            <div class="p-4 text-center" style="border: 2px dashed #E2E8F0; border-radius: 12px; background-color: #F8FAF9;">
                                <i class="bi bi-cloud-arrow-up fs-1" style="color: #728C63;"></i>
                                <input type="file" name="profilepic" class="form-control mt-3 shadow-none" accept="image/*">
                            </div>
                        </div>

                        <div class="col-12 mt-2 d-flex gap-2">
                            <button type="submit" class="theme-btn">
                                <i class="bi bi-person-plus-fill me-2"></i>Register User
                            </button>
                            <button type="reset" class="outline-btn">
                                Clear Fields
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>