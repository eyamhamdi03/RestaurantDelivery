document.getElementById('addDishForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const dishName = document.getElementById('dishName').value.trim();
    const dishPrice = document.getElementById('dishPrice').value.trim();
    const dishPhoto = document.getElementById('dishPhoto').value.trim();

    if (!dishName || !dishPrice || !dishPhoto) {
        alert('Please fill in all fields.');
        return;
    }

    if (confirm('Are you sure you want to add this dish to the menu?')) {
        alert('Dish added to the menu!');
        // Reset the form
        this.reset();
    }
});
