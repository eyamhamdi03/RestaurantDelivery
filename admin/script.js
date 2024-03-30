var MenuBtn = document.querySelector(".FillBtn");
var OrdersBtn = document.querySelector(".OffBtn");
MenuBtn.textContent = "Our Menu";
OrdersBtn.textContent = "Orders";
MenuBtn.addEventListener("click", () => {
document.getElementById("Menu").scrollIntoView({ behavior:"smooth" });
});
OrdersBtn.addEventListener("click", () => {
        window.location.href = "Orders.php";
});

