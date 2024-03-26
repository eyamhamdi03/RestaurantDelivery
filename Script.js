let userStatus = "normal"; 

fetch('nav.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('nav-placeholder').innerHTML = data;
        updateNavigationBar(userStatus); 
        updateButtons(userStatus); 

    });

var cards = [
    { name: "Chicken Salad", price: "10.25 DT", photo: "Food Photo.png" },
    { name: "Margherita Pizza", price: "12.50 DT", photo: "2.png" },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", photo: "3.png" },
    { name: "Classic Cheeseburger", price: "8.99 DT", photo: "4.png" },
];

var menuRow = document.getElementById("menuRow");
var rows = document.querySelectorAll(".row");

cards.forEach(function(card, index) {
    if (index % 4 === 0) {
        var newRow = document.createElement("div");
        newRow.classList.add("row");
        menuRow.appendChild(newRow);
        rows = document.querySelectorAll(".row"); 
    }

    var lastRow = rows[rows.length - 1];

    var cardDiv = document.createElement("div");
    cardDiv.classList.add("col");
    cardDiv.innerHTML = `
        <div class="card-wrapper">
            <div class="card">
                <img src="${card.photo}" class="card-img-top" alt="Food Photo">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="review">
                            <div class="badge bg-success">4.4</div>
                            <span class="text-muted">Dining & Delivery</span>
                        </div>
                        <div class="price">${card.price}</div>
                    </div>
                    <h5 class="card-title" style="margin-top: 10px; margin-bottom: 10px;">${card.name}</h5>
                    <a href="#" class="${userStatus === 'admin' ? 'btn-danger' : 'btn-primary'} btn">${userStatus === 'admin' ? 'Delete' : 'Order Now !'}</a>
                </div>
            </div>
        </div>
    `;
    lastRow.appendChild(cardDiv);
});


function updateNavigationBar(userStatus) {
    let navElement = document.getElementById("navigation");
    let menuItems = navElement.querySelector(".menu-items");

    if (userStatus === "admin") {
        menuItems.innerHTML = `
            <a href="home.html">Home</a>
            <a href="#">Menu</a>
            <a href="#">Orders</a>
            <a href="http://localhost:5500/RestaurantDelivery/login.html">Logout</a>
        `;
    } else if (userStatus === "normal") {
        menuItems.innerHTML = `
            <a href="home.html">Home</a>
            <a href="#">Menu</a>
            <a href="#">Your orders</a>
            <a href="Login.html">Logout</a>
        `;
    }
}
function updateButtons(userStatus) {
    var getStartedBtn = document.querySelector(".FillBtn");
    var createAccountBtn = document.querySelector(".OffBtn");

    if (userStatus === "normal") {
        getStartedBtn.textContent ="Your Orders" ;
        createAccountBtn.textContent = "Order Now";
        createAccountBtn.addEventListener("click", () => {
            document.getElementById("Menu").scrollIntoView({ behavior:"smooth" });
        });
    } else if (userStatus === "admin") {
        getStartedBtn.textContent = "Our Menu";
        createAccountBtn.textContent = "Orders";
        getStartedBtn.addEventListener("click", () => {
            document.getElementById("Menu").scrollIntoView({ behavior:"smooth" });
        });
        getStartedBtn.addEventListener("click", () => {
            window.location.href = "admin-orders.html";
        });

    }
}

