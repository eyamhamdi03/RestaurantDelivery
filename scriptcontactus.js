
function resetForm() {
    document.getElementById("contactForm").reset();
    }
function showSuccessMessage() {
    document.getElementById("successMessage").style.display = "block";
    }
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    fetch(this.action, {
        method: this.method,
        body: new FormData(this)
    })
    .then(response => {
        if (response.ok) {
        showSuccessMessage();
        resetForm();
        } else {
        throw new Error('Try again later. ');
        }
    })
    .catch(error => console.error('Error:', error));
});