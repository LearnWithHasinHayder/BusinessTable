<div class="container mt-4">
    <div class="row justify-content-between">
        <div class="align-customers-center col">
            <h5 class="fw-bold">Business Table</h5>
        </div>
        <div class="align-customers-center col">
            <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn  px-4 btn-success">Create
                New</button>
        </div>
    </div>
</div>
<hr />

<div class="container">
    <div class="row">
        <div class="col-md-2 px-2">
            <label>Per Page</label>
            <select id="perPage" class="form-control form-select-sm form-select">
                <option>5</option>
                <option>10</option>
                <option>15</option>
            </select>
        </div>

        <div class="col-md-2 px-2">
            <label>Search</label>
            <div class="input-group">
                <input value="" type="text" id="keyword" class="form-control form-control-sm">
                <button class="btn btn-sm btn-success" type="button" id="searchButton">Search</button>
            </div>
        </div>
    </div>
</div>
<hr />

<div class="container">

    <div class="row">


        <div class="col-md-12 p-2 col-sm-12 col-lg-12">
            <div class="shadow-sm bg-white rounded-3 p-2">
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">

                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-2 p-2">
            <div class="">
                <button onclick="handlePrevious()" id="previousButton" class="btn btn-sm btn-success">Previous</button>
                <button onclick="handleNext()" id="nextButton" class="btn btn-sm mx-1 btn-success">Next</button>
            </div>
        </div>

    </div>
</div>

<script>
    let currentPage = 1

    // Function to fetch and display the list of customers
    async function getList() {
        const perPage = document.getElementById("perPage").value
        const keyword = document.getElementById("keyword").value

        try {
            showLoader()
            const response = await axios.get(
                `/customers?page=${currentPage}&perPage=${perPage}&keyword=${keyword}`)
            updateTable(response.data)
        } catch (error) {
            console.error('Error fetching customer data:', error)
        } finally {
            hideLoader();
        }
    }

    // Function to update the table with customer data
    function updateTable(data) {
        const tableList = document.getElementById("tableList");

        // Check if there are no customers to display
        if (!data.data.length) {
            tableList.innerHTML = '<tr><td colspan="4" class="text-center">No customers found.</td></tr>';
            return;
        }

        // Build the rows HTML string
        const rowsHtml = data.data.map(customer => {
            return `<tr>
                    <td>${customer.name}</td>
                    <td>${customer.email}</td>
                    <td>${customer.mobile}</td>
                    <td>
                        <button data-id="${customer.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${customer.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>`;
        }).join('');

        // Update the table with the new rows
        tableList.innerHTML = rowsHtml;
    }

    // Event listeners for pagination and search
    document.getElementById('perPage').addEventListener('change', () => {
        currentPage = 1
        getList()
    })


    document.getElementById('searchButton').addEventListener('click', () => {
        currentPage = 1
        getList()
    })

    // Functions for handling pagination buttons
    function handlePrevious() {
        if (currentPage > 1) {
            currentPage--
            getList()
        }
    }

    function handleNext() {
        currentPage++
        getList()
    }

    // Function to delete a customer
    async function deletecustomer(id) {
        let isConfirmed = confirm("Are you sure you want to delete this customer?")
        if (isConfirmed) {
            try {
                showLoader()
                await axios.delete(`/customers/${id}`)
                getList()
            } catch (error) {
                console.error('Error deleting customer:', error)
            } finally {
                hideLoader();
            }
        }
    }

    // Attach event listeners to dynamically created buttons
    document.getElementById('tableList').addEventListener('click', function(event) {
        const target = event.target

        if (target.classList.contains('deleteBtn')) {
            const customerId = target.getAttribute('data-id')
            deletecustomer(customerId)
        }

        if (target.classList.contains('editBtn')) {
            const customerId = target.getAttribute('data-id')
            fillUpUpdateForm(customerId)
        }
    })




    // Initial list fetch
    getList()
</script>
