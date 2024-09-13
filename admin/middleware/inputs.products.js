document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('drop-area-product');
    const input = document.getElementById('imageUpload-product');
    const preview = document.getElementById('imagePreview-product');
    const loadingContainer = document.getElementById('loadingContainer-product');
    const checkmarkContainer = document.getElementById('checkmarkContainer-product');
    const errorContainer = document.getElementById('errorContainer-product');
    const dropzoneDesc = document.querySelector('.dropzone-desc');

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
    }

    function unhighlight() {
        dropArea.classList.remove('drop-zone--positioning');
        dropArea.classList.remove('drop-zone--over');
        preview.classList.remove('drop-zone--positioning');
        preview.classList.remove('drop-zone--over');
        dropzoneDesc.innerHTML = `
            <i class="fa fa-image"></i>
            <p>Producto</p>
        `;
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
                setTimeout(() => {
                    previewFile(file);
                }, 1000); // Añadir un retraso de 1 segundo antes de previsualizar la imagen
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
        }, 2000);
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