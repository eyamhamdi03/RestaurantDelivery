var userStatus = "admin"; // changed to var for compatibility with the rest of the code
fetchData();
var cards = [];
var menuRow = document.getElementById("menuRow");
var rows = document.querySelectorAll(".row");
renderMenu(); // Render the menu initially

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
    
    async function fetchData() {
        updateNavigationBar(userStatus);
        updateButtons(userStatus);
    
        renderMenu();
    }
    
    