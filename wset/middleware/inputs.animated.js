class ImageUploader {
    constructor(container) {
        this.container = container;
        this.options = this.getOptionsFromDataAttributes();
        this.init();
    }

    getOptionsFromDataAttributes() {
        return {
            icon: this.container.dataset.icon,
            accept: this.container.dataset.accept,
            validTypes: this.container.dataset.validTypes.split(',').map(type => type.trim()),
            text: this.container.dataset.text,
            borderRadius: this.container.dataset.borderRadius
        };
    }

    init() {
        this.uploadInput = this.container.querySelector(`#imageUpload`);
        this.dropArea = this.container.querySelector(`#drop-area`);
        this.imagePreview = this.container.querySelector(`#imagePreview`);
        this.loadingContainer = this.container.querySelector(`#loadingContainer`);
        this.checkmarkContainer = this.container.querySelector(`#checkmarkContainer`);
        this.errorContainer = this.container.querySelector(`#errorContainer`);

        this.uploadInput.addEventListener('change', (e) => this.handleFile(e.target.files[0]));
        this.initDragAndDrop();
    }

    handleFile(file) {
        this.resetUI(); // Ensure UI is reset before handling the new file
        if (!this.isValidFileType(file)) {
            this.showError();
            return;
        }
        const reader = new FileReader();
        reader.onloadstart = () => this.showLoadingIndicator();
        reader.onloadend = (e) => {
            this.animateWaterFill(() => {
                if (this.options.validTypes.includes('image/jpeg') || this.options.validTypes.includes('image/png') || this.options.validTypes.includes('image/jpg')) {
                    this.imagePreview.style.backgroundImage = 'url(' + e.target.result + ')';
                    this.imagePreview.innerHTML = ''; // Clear the icon and text
                    this.container.classList.add('image-uploaded'); // Add shadow class
                } else {
                    this.imagePreview.innerHTML = '<i class="fa fa-check check-view"></i><p class="success">Subido</p>';
                    this.dropArea.style.backgroundColor = '#40f00bf1'; // Change background color to green for non-image files
                }
                this.hideLoadingIndicator();
                this.showSuccess();
                this.removeDashedBorders(); // Remove dashed borders from the current container
            });
        };
        reader.readAsDataURL(file);
    }

    isValidFileType(file) {
        const validTypes = this.options.validTypes;
        return validTypes.includes(file.type);
    }

    showError() {
        this.imagePreview.style.backgroundImage = ''; // Clear the background image
        this.imagePreview.innerHTML = '<i class="fa fa-ban"></i><p>Formato Incorrecto</p>';
        this.imagePreview.classList.add('error');
        this.dropArea.classList.add('drop-zone--error');
        this.imagePreview.classList.add('drop-zone--error');
        setTimeout(() => {
            this.imagePreview.innerHTML = `<i class="fa ${this.options.icon}"></i><p>${this.options.text}</p>`;
            this.imagePreview.classList.remove('error');
            this.dropArea.classList.remove('drop-zone--error');
            this.imagePreview.classList.remove('drop-zone--error');
        }, 2000); // Restore after 2 seconds
    }

    showLoadingIndicator() {
        this.imagePreview.style.backgroundImage = ''; // Clear the background image
        this.imagePreview.innerHTML = ''; // Clear the icon and text
        this.loadingContainer.style.display = 'flex';
    }

    hideLoadingIndicator() {
        this.loadingContainer.style.display = 'none';
    }

    showSuccess() {
        this.checkmarkContainer.style.display = 'flex';
    }

    resetUI() {
        this.imagePreview.style.backgroundImage = ''; // Clear the background image
        this.imagePreview.innerHTML = `<i class="fa ${this.options.icon}"></i><p>${this.options.text}</p>`; // Reset to initial state
        this.checkmarkContainer.style.display = 'none'; // Hide checkmark
        this.errorContainer.style.display = 'none'; 
        this.container.classList.remove('image-uploaded'); // Remove shadow class
        this.dropArea.style.backgroundColor = ''; // Reset background color
    }

    animateWaterFill(callback) {
        const waterFill = document.createElement('div');
        waterFill.className = 'water-fill';
        this.imagePreview.appendChild(waterFill);

        waterFill.addEventListener('animationend', () => {
            this.imagePreview.removeChild(waterFill);
            callback();
        });
    }

    initDragAndDrop() {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            this.dropArea.addEventListener(eventName, this.preventDefaults, false);
            document.body.addEventListener(eventName, this.preventDefaults, false); // Prevent default behavior on the whole document
        });

        this.dropArea.addEventListener('dragover', (e) => this.handleDragOver(e), false);
        this.dropArea.addEventListener('dragleave', (e) => this.handleDragLeave(e), false);
        this.dropArea.addEventListener('drop', (e) => this.handleDrop(e), false);
    }

    preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    handleDragOver(e) {
        this.dropArea.classList.add('drop-zone--over');
        this.imagePreview.classList.add('drop-zone--over');
    }

    handleDragLeave(e) {
        this.dropArea.classList.remove('drop-zone--over');
        this.imagePreview.classList.remove('drop-zone--over');
    }

    handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files && files[0]) {
            this.handleFile(files[0]);
        }

        this.dropArea.classList.remove('drop-zone--over');
        this.imagePreview.classList.remove('drop-zone--over');
    }

    removeDashedBorders() {
        this.dropArea.style.border = 'none';
    }
}

// Initialize the ImageUploader instances automatically based on data attributes
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.container').forEach(container => {
        new ImageUploader(container);
    });
});