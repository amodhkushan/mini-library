<?php
include '../Controllers/finescontroller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Fine Checker</title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/navsidebar.css">
    <link rel="stylesheet" href="../../public/assets/css/dashboradstyle.css">
    <link rel="stylesheet" href="../../public/assets/css/fines.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php include '../Includes/navsidebar.php' ?>

    <div class="content d-flex flex-column flex-grow-1" id="main-content">
        <?php include '../Includes/navbar.php' ?>

        <div class="container-fluid mt-5">
            <div class="row g-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius: 16px; border: 1px solid #E2E8F0 !important; background: #fff;">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                                <div>
                                    <p class="text-uppercase small mb-2" style="letter-spacing: 0.08em; color: #64748B; font-weight: 700;">Accounts</p>
                                    <h3 class="fw-bold mb-0" style="color: var(--main-dark);">Fines & Payments</h3>
                                </div>
                                <div class="badge rounded-pill px-3 py-2" style="background-color: #E8F0E6; color: #4A6741; font-size: 0.8rem;">
                                    <i class="bi bi-cash-stack me-2"></i>Library dues
                                </div>
                            </div>

                            <div class="search-panel p-4 mb-4">
                                <form method="post" class="row g-3 align-items-end">
                                    <div class="col-md-8">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Enter Your NIC Number</label>
                                        <input type="text" name="nic" value="<?php echo htmlspecialchars($nic_input); ?>" class="form-control form-control-lg shadow-none border-0" style="background-color: #F8FAF9; border-radius: 12px;" placeholder="e.g. 200504234144" required>
                                    </div>
                                    <div class="col-md-4 d-grid">
                                        <button type="submit" name="search" class="btn btn-primary-custom btn-lg rounded-pill shadow-sm">
                                            <i class="bi bi-search me-2"></i>Search
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <?php if (isset($_POST['search'])): ?>
                                <?php if ($result && $result->num_rows > 0): ?>
                                    <div class="table-responsive border rounded-4 overflow-hidden">
                                        <table class="table table-hover align-middle mb-0">
                                            <thead style="background-color: #F8FAF9; color: #4A6741;">
                                                <tr>
                                                    <th class="border-0 px-3 py-3 small text-uppercase">ISBN</th>
                                                    <th class="border-0 py-3 small text-uppercase">Due Date</th>
                                                    <th class="border-0 py-3 small text-uppercase">Late Days</th>
                                                    <th class="border-0 py-3 small text-uppercase">Daily Rate</th>
                                                    <th class="border-0 py-3 small text-uppercase">Total Fine</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()):
                                                    $today = new DateTime();
                                                    $due_date = new DateTime($row['duedate']);
                                                    $diff = $today->diff($due_date);
                                                    $late_days = ($today > $due_date) ? $diff->days : 0;
                                                ?>
                                                    <tr>
                                                        <td class="px-3 fw-medium"><?php echo htmlspecialchars($row['isbn']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['duedate']); ?></td>
                                                        <td>
                                                            <span class="badge rounded-pill px-3 py-2" style="background-color: #FEF9C3; color: #CA8A04;">
                                                                <?php echo $late_days; ?> Days
                                                            </span>
                                                        </td>
                                                        <td>LKR <?php echo number_format((float)$row['dailyrate'], 2); ?></td>
                                                        <td class="fine-txt">LKR <?php echo number_format((float)$row['fineamount'], 2); ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p class="mt-4 mb-0 text-muted fst-italic">
                                        * Please settle these outstanding fines at the library counter.
                                    </p>
                                <?php else: ?>
                                    <div class="success-msg mt-3">No outstanding fines found for this NIC number. Thank you!</div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>