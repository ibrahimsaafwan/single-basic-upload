// public/js/script.js
function previewImage(event) {
    const preview = document.getElementById("preview");
    const file = event.target.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
    } else {
        preview.style.display = "none";
    }
}

// Confirm before deleting an image
function confirmDelete() {
    return confirm("Are you sure you want to delete this image?");
}
