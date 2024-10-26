document.addEventListener('DOMContentLoaded', function() {
    const precioInput = document.getElementById('precio');
    const precioVentaInput = document.getElementById('precioVenta');

    function limitInputLength(input, maxLength) {
        input.addEventListener('input', function() {
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });
    }

    limitInputLength(precioInput, 10);
    limitInputLength(precioVentaInput, 10);
});