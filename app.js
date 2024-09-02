document.getElementById('imageUpload').addEventListener('change', function() {
    handleFile(this.files[0]);
});

function handleFile(file) {
    if (!isValidFileType(file)) {
        showError();
        return;
    }
    resetUI(); // Reset the UI before starting a new upload
    var reader = new FileReader();
    reader.onloadstart = function() {
        showLoadingIndicator();
    };
    reader.onloadend = function(e) {
        setTimeout(function() {
            var imagePreview = document.getElementById('imagePreview');
            var dropArea = document.getElementById('drop-area');
            imagePreview.style.backgroundImage = 'url(' + e.target.result + ')';
            imagePreview.innerHTML = ''; // Clear the icon and text
            dropArea.classList.add('loaded'); // Add class to remove border
            hideLoadingIndicator();
            showSuccess();
        }, 4500); // Wait for the animation to complete
    };
    reader.readAsDataURL(file);
}

function isValidFileType(file) {
    var validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    return validTypes.includes(file.type);
}

function showError() {
    var imagePreview = document.getElementById('imagePreview');
    var dropArea = document.getElementById('drop-area');
    imagePreview.style.backgroundImage = ''; // Clear the background image
    imagePreview.innerHTML = '<i class="fa fa-ban"></i><p>Formato inválido</p>';
    imagePreview.classList.add('error');
    dropArea.classList.add('error');
    dropArea.classList.remove('loaded'); // Remove loaded class to restore dashed border
    setTimeout(function() {
        imagePreview.innerHTML = '<i class="fa fa-user"></i><p>Usuario</p>';
        imagePreview.classList.remove('error');
        dropArea.classList.remove('error');
        dropArea.classList.remove('loaded'); // Ensure the loaded class is removed
    }, 2000); // Restore after 2 seconds
}

function showLoadingIndicator() {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.style.backgroundImage = ''; // Clear the background image
    imagePreview.innerHTML = ''; // Clear the icon and text
    var loadingContainer = document.getElementById('loadingContainer');
    loadingContainer.style.display = 'flex';
    animateProgress();
}

function hideLoadingIndicator() {
    var loadingContainer = document.getElementById('loadingContainer');
    loadingContainer.style.display = 'none';
}

function updateProgress(percent) {
    var percentage = document.getElementById('percentage');
    percentage.textContent = percent + '%';
    if (percent === 100) {
        setTimeout(function() {
            percentage.style.display = 'none';
            showSuccess();
        }, 500); // Small delay to ensure the percentage text is hidden before showing the success animation
    }
}

function animateProgress() {
    var percent = 0;
    var interval = setInterval(function() {
        if (percent >= 100) {
            clearInterval(interval);
        } else {
            percent++;
            updateProgress(percent);
        }
    }, 20); // Adjust the interval time to control the speed of the animation
}

function showSuccess() {
    var checkmarkContainer = document.getElementById('checkmarkContainer');
    checkmarkContainer.style.display = 'flex';
}

function showErrorAnimation() {
    var errorContainer = document.getElementById('errorContainer');
    errorContainer.style.display = 'flex';
}

function resetUI() {
    var imagePreview = document.getElementById('imagePreview');
    var dropArea = document.getElementById('drop-area');
    var percentage = document.getElementById('percentage');
    var checkmarkContainer = document.getElementById('checkmarkContainer');
    var errorContainer = document.getElementById('errorContainer');

    imagePreview.style.backgroundImage = ''; // Clear the background image
    imagePreview.innerHTML = '<i class="fa fa-user"></i><p>Usuario</p>'; // Reset to initial state
    dropArea.classList.remove('loaded'); // Remove loaded class
    percentage.style.display = 'block'; // Ensure percentage is visible
    percentage.textContent = '0%'; // Reset percentage text
    checkmarkContainer.style.display = 'none'; // Hide checkmark
    errorContainer.style.display = 'none'; // Hide error
}

// Drag and Drop functionality
var dropArea = document.getElementById('drop-area');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    document.body.addEventListener(eventName, preventDefaults, false); // Prevent default behavior on the whole document
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => {
        dropArea.classList.add('highlight');
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.classList.add('highlight');
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => {
        dropArea.classList.remove('highlight');
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.classList.remove('highlight');
    }, false);
});

dropArea.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    var dt = e.dataTransfer;
    var files = dt.files;

    if (files && files[0]) {
        handleFile(files[0]);
    }
}