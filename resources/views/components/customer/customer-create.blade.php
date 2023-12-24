<div class="modal fade" id="create-modal" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Customer</h6>
            </div>
            <div class="modal-body">
                <form id="customer-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control mb-2" id="customer-name">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control mb-2" id="customer-email">
                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customer-mobile">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="saveCustomer()" id="save-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function saveCustomer() {
        const customerName = document.getElementById('customer-name').value;
        const customerEmail = document.getElementById('customer-email').value;
        const customerMobile = document.getElementById('customer-mobile').value;

        // Simple front-end validation
        if (!customerName || !customerEmail || !customerMobile) {
            alert("All fields are required!");
            return;
        }

        try {
            showLoader();
            closeModal('create-modal');

            const response = await axios.post("/customers", {
                name: customerName,
                email: customerEmail,
                mobile: customerMobile
            });

            if (response.status === 201) {
                document.getElementById("customer-form").reset();
                await getList(currentPage);
            } else {
                alert("Request failed!");
            }
        } catch (error) {
            console.error('Error creating customer:', error);
            alert("An error occurred while saving the customer.");
        } finally {
            hideLoader();
        }
    }
</script>
