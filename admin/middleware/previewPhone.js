document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('nombre_producto');
    const priceInput = document.getElementById('precioVenta');
    const imageInput = document.getElementById('imageUpload-front');
    const previewName = document.getElementById('name_previewPhone');
    const previewPrice = document.getElementById('pricePreviewPhone');
    const previewImage = document.getElementById('imgPreviewPhone');

    // Función para insertar saltos de línea cada 15 caracteres y truncar a 80 caracteres
    function formatName(text, interval, maxLength) {
        let result = '';
        for (let i = 0; i < text.length && i < maxLength; i += interval) {
            result += text.slice(i, i + interval) + '\n';
        }
        if (text.length > maxLength) {
            result = result.slice(0, maxLength) + '...';
        }
        return result;
    }

    // Actualizar el nombre del producto en la vista previa
    nameInput.addEventListener('input', function() {
        const formattedName = formatName(nameInput.value, 15, 80);
        previewName.textContent = formattedName;
    });

    // Actualizar el precio del producto en la vista previa
    priceInput.addEventListener('input', function() {
        const price = parseFloat(priceInput.value);
        const formattedPrice = price.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        previewPrice.textContent = `$${formattedPrice}`;
    });

    // Actualizar la imagen del producto en la vista previa
    imageInput.addEventListener('change', function() {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});