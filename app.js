document.getElementById('imageUpload').addEventListener('change', function() {
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.style.backgroundImage = 'url(' + e.target.result + ')';
            imagePreview.style.display = 'block';
            imagePreview.style.opacity = 1;
        }
        reader.readAsDataURL(input.files[0]);
    }
}