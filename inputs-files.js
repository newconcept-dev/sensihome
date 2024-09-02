class ImageUploader {
    constructor(containerId, options) {
        this.container = document.getElementById(containerId);
        this.options = options;
        this.injectStyles();
        this.render();
        this.init();
    }

    injectStyles() {
        const styles = `
            .avatar-upload {
                position: relative;
                margin: 50px auto;
                max-width: 100%;
            }
            .avatar-upload .avatar-edit {
                position: absolute;
                right: 12px;
                z-index: 1;
                top: 10px;
            }
            .avatar-upload .avatar-edit input {
                display: none;
            }
            .avatar-upload .avatar-edit input + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all 0.2s ease-in-out;
            }
            .avatar-upload .avatar-edit input + label:hover {
                background: #f1f1f1;
                border-color: #d6d6d6;
            }
            .avatar-upload .avatar-edit input + label:after {
                content: "\\f040";
                font-family: 'FontAwesome';
                color: #757575;
                position: absolute;
                top: 10px;
                left: 0;
                right: 0;
                text-align: center;
                margin: auto;
            }
            .avatar-upload .avatar-preview {
                position: relative;
                border-radius: 100%;
                border: 6px solid #F8F8F8;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            }
            .avatar-upload .avatar-preview > div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            #drop-area {
                border: 2px dashed #ccc;
                border-radius: 100%;
                padding: 0px;
                text-align: center;
            }
            #drop-area.highlight {
                border-color: rgb(67, 255, 10);
            }
            #drop-area.loaded {
                border: none;
                box-shadow: 0px 0px 10px 2px rgba(7, 7, 7, 0.482);
            }
            #drop-area.error {
                border-color: red;
            }
            .dropzone-desc {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100%;
                color: #ccc;
            }
            .dropzone-desc i {
                font-size: 48px;
                margin-bottom: 10px;
            }
            .dropzone-desc.error {
                color: red;
            }
            .dropzone-desc.highlight {
                color: rgb(67, 255, 10);
            }
            .loading-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
            .wave {
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 100%;
                background: rgba(67, 255, 10, 0.692);
                border-radius: 0;
                animation: wave 6.5s linear forwards;
            }
            @keyframes wave {
                0% { transform: translateY(100%) rotate(0deg); }
                100% { transform: translateY(0%) rotate(0deg); }
            }
            .percentage {
                position: relative;
                font-size: 20px;
                color: #FFFFFF;
                font-weight: bold;
                z-index: 1;
            }
            .checkmark-container, .error-container {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 10px;
            }
            .checkmark, .error-mark {
                width: 40px;
                height: 40px;
                display: block;
                stroke-width: 4;  
                stroke: #ffffff;
                filter: invert(100%);
                stroke-miterlimit: 10;
                margin: 10px auto;
            }
            .checkmark__circle, .error-mark__circle {
                stroke-dasharray: 166;
                stroke-dashoffset: 166;
                stroke-width: 2;
                stroke-miterlimit: 10;
                stroke: #ffffff;
                filter: invert(100%);
                fill: none;
                animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
            }
            .checkmark__check, .error-mark__line {
                stroke-dasharray: 48;
                stroke-dashoffset: 48;
                stroke-width: 2;
                stroke-miterlimit: 10;
                stroke: #020202;
                fill: none;
                animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
            }
        `;
        const styleSheet = document.createElement("style");
        styleSheet.type = "text/css";
        styleSheet.innerText = styles;
        document.head.appendChild(styleSheet);
    }

    render() {
        const { size, icon, accept, text, borderRadius } = this.options;
        this.container.innerHTML = `
            <div class="avatar-upload" style="max-width: ${size.width}px;">
                <div class="avatar-edit">
                    <input type="file" id="imageUpload" accept="${accept}">
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview" id="drop-area" style="width: ${size.width}px; height: ${size.height}px; border-radius: ${borderRadius};">
                    <div id="imagePreview" class="dropzone-desc" style="border-radius: ${borderRadius};">
                        <i class="fa ${icon}"></i>
                        <p>${text}</p>
                    </div>
                    <div class="loading-container" id="loadingContainer" style="display: none;">
                        <div class="wave" id="wave"></div>
                        <div class="percentage" id="percentage">0%</div>
                        <div class="checkmark-container" id="checkmarkContainer" style="display: none;">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                            </svg>
                        </div>
                        <div class="error-container" id="errorContainer" style="display: none;">
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
        this.uploadInput = this.container.querySelector('#imageUpload');
        this.dropArea = this.container.querySelector('#drop-area');
        this.imagePreview = this.container.querySelector('#imagePreview');
        this.loadingContainer = this.container.querySelector('#loadingContainer');
        this.checkmarkContainer = this.container.querySelector('#checkmarkContainer');
        this.errorContainer = this.container.querySelector('#errorContainer');
        this.percentage = this.container.querySelector('#percentage');

        this.uploadInput.addEventListener('change', (e) => this.handleFile(e.target.files[0]));
        this.initDragAndDrop();
    }

    handleFile(file) {
        if (!this.isValidFileType(file)) {
            this.showError();
            return;
        }
        this.resetUI();
        const reader = new FileReader();
        reader.onloadstart = () => this.showLoadingIndicator();
        reader.onloadend = (e) => {
            setTimeout(() => {
                this.imagePreview.style.backgroundImage = 'url(' + e.target.result + ')';
                this.imagePreview.innerHTML = ''; // Clear the icon and text
                this.dropArea.classList.add('loaded'); // Add class to remove border
                this.hideLoadingIndicator();
                this.showSuccess();
            }, 4500); // Wait for the animation to complete
        };
        reader.readAsDataURL(file);
    }

    isValidFileType(file) {
        const validTypes = this.options.validTypes;
        return validTypes.includes(file.type);
    }

    showError() {
        this.imagePreview.style.backgroundImage = ''; // Clear the background image
        this.imagePreview.innerHTML = '<i class="fa fa-ban"></i><p>Formato inválido</p>';
        this.imagePreview.classList.add('error');
        this.dropArea.classList.add('error');
        this.dropArea.classList.remove('loaded'); // Remove loaded class to restore dashed border
        setTimeout(() => {
            this.imagePreview.innerHTML = `<i class="fa ${this.options.icon}"></i><p>${this.options.text}</p>`;
            this.imagePreview.classList.remove('error');
            this.dropArea.classList.remove('error');
            this.dropArea.classList.remove('loaded'); // Ensure the loaded class is removed
        }, 2000); // Restore after 2 seconds
    }

    showLoadingIndicator() {
        this.imagePreview.style.backgroundImage = ''; // Clear the background image
        this.imagePreview.innerHTML = ''; // Clear the icon and text
        this.loadingContainer.style.display = 'flex';
        this.animateProgress();
    }

    hideLoadingIndicator() {
        this.loadingContainer.style.display = 'none';
    }

    updateProgress(percent) {
        this.percentage.textContent = percent + '%';
        if (percent === 100) {
            setTimeout(() => {
                this.percentage.style.display = 'none';
                this.showSuccess();
            }, 500); // Small delay to ensure the percentage text is hidden before showing the success animation
        }
    }

    animateProgress() {
        let percent = 0;
        const interval = setInterval(() => {
            if (percent >= 100) {
                clearInterval(interval);
            } else {
                percent++;
                this.updateProgress(percent);
            }
        }, 20); // Adjust the interval time to control the speed of the animation
    }

    showSuccess() {
        this.checkmarkContainer.style.display = 'flex';
    }

    showErrorAnimation() {
        this.errorContainer.style.display = 'flex';
    }

    resetUI() {
        this.imagePreview.style.backgroundImage = ''; // Clear the background image
        this.imagePreview.innerHTML = `<i class="fa ${this.options.icon}"></i><p>${this.options.text}</p>`; // Reset to initial state
        this.dropArea.classList.remove('loaded'); // Remove loaded class
        this.percentage.style.display = 'block'; // Ensure percentage is visible
        this.percentage.textContent = '0%'; // Reset percentage text
        this.checkmarkContainer.style.display = 'none'; // Hide checkmark
        this.errorContainer.style.display = 'none'; // Hide error
    }

    initDragAndDrop() {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            this.dropArea.addEventListener(eventName, this.preventDefaults, false);
            document.body.addEventListener(eventName, this.preventDefaults, false); // Prevent default behavior on the whole document
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            this.dropArea.addEventListener(eventName, () => {
                this.dropArea.classList.add('highlight');
                this.imagePreview.classList.add('highlight');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            this.dropArea.addEventListener(eventName, () => {
                this.dropArea.classList.remove('highlight');
                this.imagePreview.classList.remove('highlight');
            }, false);
        });

        this.dropArea.addEventListener('drop', (e) => this.handleDrop(e), false);
    }

    preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files && files[0]) {
            this.handleFile(files[0]);
        }
    }
}

// Initialize the ImageUploader instances with different configurations
document.addEventListener('DOMContentLoaded', () => {
    new ImageUploader('avatar-edit-sg', {
        size: { width: 192, height: 192 },
        icon: 'fa-user',
        accept: '.png, .jpg, .jpeg',
        validTypes: ['image/jpeg', 'image/png', 'image/jpg'],
        text: 'Usuario',
        borderRadius: '50%'
    });

    new ImageUploader('upload-product-img-sg', {
        size: { width: 350, height: 350 },
        icon: 'fa-image',
        accept: '.png, .jpg, .jpeg',
        validTypes: ['image/jpeg', 'image/png', 'image/jpg'],
        text: 'Producto',
        borderRadius: '5px'
    });

    new ImageUploader('upload-file-sg', {
        size: { width: 250, height: 250 },
        icon: 'fa-file',
        accept: '.pdf, .doc, .docx',
        validTypes: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        text: 'Archivo',
        borderRadius: '5px'
    });

    new ImageUploader('upload-video-sg', {
        size: { width: 350, height: 350 },
        icon: 'fa-video-camera',
        accept: '.mp4, .avi, .mov',
        validTypes: ['video/mp4', 'video/x-msvideo', 'video/quicktime'],
        text: 'Video',
        borderRadius: '20px'
    });

    new ImageUploader('upload-doc-sg', {
        size: { width: 250, height: 250 },
        icon: 'fa-file-text',
        accept: '.pdf, .doc, .docx',
        validTypes: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        text: 'Documento',
        borderRadius: '15px'
    });
});