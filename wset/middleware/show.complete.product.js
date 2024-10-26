document.addEventListener('DOMContentLoaded', function() {
    const checkCompleteProduct = document.getElementById('check-complete-product');
    const checkDetailProduct = document.getElementById('check-detail-product');
    const buttonCompleteProductContainer = document.getElementById('button-complete-product-container');
    const buttonDetailProductContainer = document.getElementById('button-detail-product-container');

    function toggleButtonVisibility() {
        if (checkCompleteProduct.checked) {
            buttonCompleteProductContainer.classList.remove('d-none');
            buttonCompleteProductContainer.classList.add('d-flex');
        } else {
            buttonCompleteProductContainer.classList.remove('d-flex');
            buttonCompleteProductContainer.classList.add('d-none');
        }

        if (checkDetailProduct.checked) {
            buttonDetailProductContainer.classList.remove('d-none');
            buttonDetailProductContainer.classList.add('d-flex');
        } else {
            buttonDetailProductContainer.classList.remove('d-flex');
            buttonDetailProductContainer.classList.add('d-none');
        }
    }

    // Initial visibility based on the current state of the checkboxes
    toggleButtonVisibility();

    // Add event listeners to checkboxes
    checkCompleteProduct.addEventListener('change', toggleButtonVisibility);
    checkDetailProduct.addEventListener('change', toggleButtonVisibility);
});