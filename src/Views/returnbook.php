<div class="card border-0 shadow-sm" style="border-radius: 12px; border: 1px solid #E2E8F0 !important; background-color: #FFFFFF;">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: #E2E8F0 !important;">
        <div class="d-flex align-items-center">
            <i class="bi bi-arrow-return-left me-2 fs-5" style="color: #6B8E61;"></i>
            <h5 class="fw-bold mb-0" style="color: #4A6741;">Return Book</h5>
        </div>
        <a href="bookmanagement.php" class="text-decoration-none small fw-bold" style="color: #6B8E61;">
            Borrow Log <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>

    <div class="card-body p-4">
        <form action="process_return.php" method="POST">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">MEMBER / NIC</label>
                    <input type="text" name="member_nic" class="form-control bg-light border-0 p-2 shadow-none"
                        placeholder="e.g. 199512345678 or MEMBER-101" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">BOOK ISBN</label>
                    <input type="text" name="isbn" class="form-control bg-light border-0 p-2 shadow-none"
                        placeholder="e.g. 978-0735211292" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">BORROWED DATE</label>
                    <input type="date" name="borrowed_date" class="form-control bg-light border-0 p-2 shadow-none" style="border-radius: 8px;" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted">RETURN DATE</label>
                    <input type="date" name="return_date" class="form-control bg-light border-0 p-2 shadow-none" style="border-radius: 8px;" required>
                </div>

                <div class="col-12 mt-4 d-flex gap-2">
                    <button type="submit" name="return_book" class="btn px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #728C63; border: none;">
                        <i class="bi bi-check-circle me-2"></i>Return Book
                    </button>
                    <button type="reset" class="btn btn-light px-4 py-2 rounded-pill text-muted border" style="background-color: #F8FAF9;">
                        Clear
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
