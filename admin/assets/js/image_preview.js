function showImagePreview() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "block";
}

function closeImagePreview() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "none";
}

// Close the modal when clicking outside the image
window.onclick = function(event) {
    var modal = document.getElementById("imageModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
