class ImageUploader {
    constructor(container) {
        this.container = container;
        this.options = this.getOptionsFromDataAttributes();
        this.render();
        this.init();
    }

    getOptionsFromDataAttributes() {
        return {
            size: {
                width: this.container.dataset.width,
                height: this.container.dataset.height
            },
            icon: this.container.dataset.icon,
            accept: this.container.dataset.accept,
            validTypes: this.container.dataset.validTypes.split(',').map(type => type.trim()),
            text: this.container.dataset.text,
            borderRadius: this.container.dataset.borderRadius
        };
    }

    render() {
        const { size, icon, accept, text, borderRadius } = this.options;
        this.container.innerHTML = `
        <link rel="stylesheet" href="./inputs-files.css">
            <div class="avatar-upload" style="max-width: ${size.width}px;">
                <div class="avatar-edit">
                    <input type="file" id="imageUpload-${this.container.id}" accept="${accept}">
                    <label for="imageUpload-${this.container.id}"></label>
                </div>
                <div class="avatar-preview" id="drop-area-${this.container.id}" style="width: ${size.width}px; height: ${size.height}px; border-radius: ${borderRadius};">
                    <div id="imagePreview-${this.container.id}" class="dropzone-desc" style="border-radius: ${borderRadius};">
                        <i class="fa ${icon}"></i>
                        <p>${text}</p>
                    
                    </div>
                    <div class="loading-container" id="loadingContainer-${this.container.id}" style="display: none;">
                        <div></div>
                        <div class="checkmark-container" id="checkmarkContainer-${this.container.id}" style="display: none;">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                            </svg>
                        </div>
                        <div class="error-container" id="errorContainer-${this.container.id}" style="display: none;">
                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    init() {
        this.uploadInput = this.container.querySelector(`#imageUpload-${this.container.id}`);
        this.dropArea = this.container.querySelector(`#drop-area-${this.container.id}`);
        this.imagePreview = this.container.querySelector(`#imagePreview-${this.container.id}`);
        this.loadingContainer = this.container.querySelector(`#loadingContainer-${this.container.id}`);
        this.checkmarkContainer = this.container.querySelector(`#checkmarkContainer-${this.container.id}`);
        this.errorContainer = this.container.querySelector(`#errorContainer-${this.container.id}`);

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