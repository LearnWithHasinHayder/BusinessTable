function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}

function openModal(modalId) {
    let myModal = new bootstrap.Modal(document.getElementById(modalId));
    myModal.show();
}

function closeModal(modalId) {
    let modalElement = document.getElementById(modalId);
    let myModal = bootstrap.Modal.getInstance(modalElement);
    if (myModal) {
        myModal.hide();
    }
}



