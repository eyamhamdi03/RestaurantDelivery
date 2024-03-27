var userStatus = "admin"; // changed to var for compatibility with the rest of the code

async function fetchData() {
    updateNavigationBar(userStatus);
    updateButtons(userStatus);

    renderMenu(); // Assuming this function is defined elsewhere in your code
}

fetchData();
async function updateButtons(userStatus) {
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
                window.location.href = "Orders.php";
            });
    
        }
        else{
            createAccountBtn.addEventListener("click", () => {
                window.location.href   ="signup.php"         
        });
        getStartedBtn.addEventListener("click", () => {
            window.location.href = "login.php";
        });
    }}
async function updateNavigationBar(userStatus) {
        let navElement = document.getElementById("navigation");
        let menuItems = navElement.querySelector(".menu-items");
    
        if (userStatus === "admin") {
            menuItems.innerHTML = `
                <a href="home.php">Home</a>
                <a href="#">Menu</a>
                <a href="Orders.php">Orders</a>
                <a href="login.php">Logout</a>
            `;
    
            let newRow = document.createElement("div");
            newRow.classList.add("row");
            let newCol = document.createElement("div");
            newCol.classList.add("col");
    
            let addNewDishButton = document.createElement("button");
            addNewDishButton.classList.add("btn", "btn-success");
            addNewDishButton.textContent = "Add New Dish";
            newCol.appendChild(addNewDishButton);
            newRow.appendChild(newCol);
            addNewDishButton.addEventListener("click", () => {
                window.location.href = "add-new-food.php"; // Redirect to add new dish page
            });
            let menuSection = document.getElementById("Menu");
            menuSection.insertAdjacentElement("afterend", newRow);
        } else if (userStatus === "normal") {
            menuItems.innerHTML = `
                <a href="home.php">Home</a>
                <a href="get-in-touch.php">Contact us</a>
                <a href="Orders.php">Your orders</a>
                <a href="Login.php">Logout</a>
            `;
        }
    }
    
    


var cards = [
    { name: "Chicken Salad", price: "10.25 DT", photo: "assets/Food Photo.png",description :"description" },
    { name: "Margherita Pizza", price: "12.50 DT", photo: "assets/2.png" ,description :"description" },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", photo: "assets/3.png",description :"description" },
    { name: "Classic Cheeseburger", price: "8.99 DT", photo: "assets/4.png" ,description :"description"},
];

var menuRow = document.getElementById("menuRow");
var rows = document.querySelectorAll(".row");

function renderMenu() {
    menuRow.innerHTML = ''; // Clear the menuRow
    rows = document.querySelectorAll(".row"); // Reset the rows array

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
                        <p class="text-muted">${card.description}</p>
                        <a href="#" class="${userStatus === 'admin' ? 'btn-danger' : 'btn-primary'} btn" onclick="handleclick(event)">${userStatus === 'admin' ? 'Delete' : 'Order Now !'}</a>
                    </div>
                </div>
            </div>
        `;
        lastRow.appendChild(cardDiv);
    });
}

function handleclick(event) {
    if (userStatus === 'admin') {
        const cardBody = event.target.closest('.card-body');
        if (cardBody) {
            const cardIndex = Array.from(cardBody.parentNode.parentNode.parentNode.children).indexOf(cardBody.parentNode.parentNode);
            cards.splice(cardIndex, 1); 
            renderMenu(); 
        }}
        else{
            if (userStatus === 'normal') {
                window.location.href = "order.php";
            } else {
                alert("You need to login first");
                window.location.href = "login.php";
        }
    }}

renderMenu(); // Render the menu initially
