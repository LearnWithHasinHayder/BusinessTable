<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Customer</h6>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerNameUpdate">

                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control mb-2" id="customerEmailUpdate">

                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control mb-2" id="customerMobileUpdate">

                                <input type="text" class="d-none" id="customerID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="updateCustomer()" id="update-btn" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function fillUpUpdateForm(id) {
        document.getElementById('customerID').value = id;
        showLoader();
        try {
            const response = await axios.get(`/customers/${id}`);
            const customerData = response.data;
            document.getElementById('customerNameUpdate').value = customerData.name;
            document.getElementById('customerEmailUpdate').value = customerData.email;
            document.getElementById('customerMobileUpdate').value = customerData.mobile;
            openModal('update-modal');
        } catch (error) {
            console.error('Error fetching customer data:', error);
            // Handle error appropriately
        } finally {
            hideLoader();
        }
    }


    async function updateCustomer() {
        const customerName = document.getElementById('customerNameUpdate').value;
        const customerEmail = document.getElementById('customerEmailUpdate').value;
        const customerMobile = document.getElementById('customerMobileUpdate').value;
        const customerID = document.getElementById('customerID').value;

        if (!customerName || !customerEmail || !customerMobile) {
            alert("All fields are required!");
            return;
        }

        try {
            closeModal('update-modal');
            showLoader();
            const response = await axios.put(`/customers/${customerID}`, {
                name: customerName,
                email: customerEmail,
                mobile: customerMobile
            });

            if (response.status === 200) {
                document.getElementById("update-form").reset();
                await getList(currentPage);
            } else {
                alert("Request failed!");
            }
        } catch (error) {
            console.error('Error updating customer:', error);
            // Handle error appropriately
        } finally {
            hideLoader();
        }
    }
</script>
