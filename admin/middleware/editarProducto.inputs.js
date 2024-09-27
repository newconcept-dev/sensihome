document.addEventListener('DOMContentLoaded', function() {
    const productUploads = document.querySelectorAll('.product-upload');

    productUploads.forEach(productUpload => {
        const dropArea = productUpload.querySelector('.drop-area');
        const input = productUpload.querySelector('.image-upload-input');
        const preview = productUpload.querySelector('.image-preview');
        const loadingContainer = productUpload.querySelector('.loading-container');
        const checkmarkContainer = productUpload.querySelector('.checkmark-container');
        const errorContainer = productUpload.querySelector('.error-container');
        const dropzoneDesc = productUpload.querySelector('.dropzone-desc');
        let previousImage = null;

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlightPositioning, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);

        // Handle file input change
        input.addEventListener('change', handleFiles, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlightPositioning() {
            if (preview.style.backgroundImage) {
                previousImage = preview.style.backgroundImage;
                preview.style.backgroundImage = '';
            }
            dropArea.classList.remove('image-uploaded'); // Restablecer los bordes
            dropArea.classList.add('drop-zone--positioning');
            preview.classList.add('drop-zone--positioning');
            dropzoneDesc.innerHTML = `
                <i class="fa fa-upload"></i>
                <p>Subir</p>
            `;
        }

        function highlightValid() {
            dropArea.classList.add('drop-zone--over');
            preview.classList.add('drop-zone--over');
            dropzoneDesc.innerHTML = `
                <i class="fa fa-check"></i>
                <p>Subido con éxito</p>
            `;
        }

        function unhighlight() {
            if (previousImage) {
                preview.style.backgroundImage = previousImage;
                previousImage = null;
            }
            dropArea.classList.remove('drop-zone--positioning');
            dropArea.classList.remove('drop-zone--over');
            preview.classList.remove('drop-zone--positioning');
            preview.classList.remove('drop-zone--over');
            if (!preview.style.backgroundImage) {
                dropzoneDesc.innerHTML = `
                    <i class="fa fa-image"></i>
                    <p>Imagen Principal</p>
                `;
            }
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            handleFiles({ target: { files } });
        }

        function handleFiles(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const file = files[0];
                if (isValidFileType(file)) {
                    highlightValid();

                    // Asignar el archivo al input de archivo
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    input.files = dataTransfer.files;

                    // Disparar manualmente el evento change
                    const event = new Event('change');
                    input.dispatchEvent(event);

                    setTimeout(() => {
                        previewFile(file);
                    }, 500); // Añadir un retraso de 0.5 segundos antes de previsualizar la imagen
                } else {
                    showError();
                }
            }
        }

        function isValidFileType(file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            return validTypes.includes(file.type);
        }

        function previewFile(file) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadstart = () => showLoadingIndicator();
            reader.onloadend = () => hideLoadingIndicator();
            reader.onload = () => {
                preview.style.backgroundImage = `url(${reader.result})`;
                preview.classList.add('image-uploaded');
                dropArea.classList.add('image-uploaded');
                dropzoneDesc.innerHTML = ''; // Quitar el texto y el icono
                showSuccess();
            };
            reader.onerror = () => showError();
        }

        function showLoadingIndicator() {
            loadingContainer.style.display = 'flex';
        }

        function hideLoadingIndicator() {
            loadingContainer.style.display = 'none';
        }

        function showSuccess() {
            checkmarkContainer.style.display = 'flex';
            setTimeout(() => {
                checkmarkContainer.style.display = 'none';
            }, 1000);
        }

        function showError() {
            dropArea.classList.add('drop-zone--error');
            dropzoneDesc.innerHTML = `
                <i class="fa fa-exclamation-triangle"></i>
                <p>Formato inválido</p>
            `;
            preview.classList.add('drop-zone--error');
            setTimeout(() => {
                dropArea.classList.remove('drop-zone--error');
                dropzoneDesc.innerHTML = `
                    <i class="fa fa-image"></i>
                    <p>Producto</p>
                `;
                preview.classList.remove('drop-zone--error');
            }, 1000);
        }
    });
});