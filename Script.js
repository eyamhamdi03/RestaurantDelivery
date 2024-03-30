var userStatus = "normal"; // changed to var for compatibility with the rest of the code
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
    if (userStatus === "normal") {
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
    
    