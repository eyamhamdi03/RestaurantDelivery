function resetForm() {
    document.getElementById("contactForm").reset();
}

function showSuccessMessage() {
    document.getElementById("successMessage").style.display = "block";
}

document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var inputs = document.getElementById("contactForm").querySelectorAll("input[type=text], input[type=email], textarea");
    var allFieldsFilled = true;
    inputs.forEach(function(input) {
        if (!input.value.trim()) {
            allFieldsFilled = false;
        }
    });
    if (allFieldsFilled) {
        fetch(this.action, {
            method: this.method,
            body: new FormData(this)
        })
        .then(response => {
            if (response.ok) {
                showSuccessMessage();
                resetForm();
            } else {
                throw new Error('Try again later!');
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert("Please fill in all fields before submitting the form!");
    }
});