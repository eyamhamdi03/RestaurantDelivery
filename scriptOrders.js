var cardsOrders = [
    { name: "Chicken Salad", price: "10.25 DT", date: "12/12/2021", delivered: true },
    { name: "Margherita Pizza", price: "12.50 DT", date: "12/12/2021", delivered: false },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", date: "12/12/2021", delivered: true },
    { name: "Classic Cheeseburger", price: "8.99 DT", date: "12/12/2021", delivered: false },
    { name: "Chicken Salad", price: "10.25 DT", date: "12/12/2021", delivered: true },
    { name: "Margherita Pizza", price: "12.50 DT", date: "12/12/2021", delivered: false },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", date: "12/12/2021", delivered: true },
    { name: "Classic Cheeseburger", price: "8.99 DT", date: "12/12/2021", delivered: false },
    { name: "Classic Cheeseburger", price: "8.99 DT", date: "12/12/2021", delivered: true },
];
var isAdmin = true;
var OrdersRow = document.getElementById("OrdersRow");
var rows = document.querySelectorAll(".row");

cardsOrders.forEach(function(card, index) {
    if (index % 4 === 0) {
        var newRow = document.createElement("div");
        newRow.classList.add("row");
        OrdersRow.appendChild(newRow);
        rows = document.querySelectorAll(".row");
    }
    var lastRow = rows[rows.length - 1];
    var cardDiv = document.createElement("div");
    cardDiv.classList.add("col");
    cardDiv.innerHTML = `
        <div class="card-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-overlay" data-index="${index}">
                        <span class="${card.delivered ? 'delivered' : 'waiting'}">${card.delivered ? 'Delivered' : 'Waiting'}</span>
                    </div>
                    <h5 class="card-title" style="margin-top: 10px; margin-bottom: 10px;">${card.name}</h5>
                    <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 30px;">
                        <div class="price">${card.price}</div>
                        <span class="date">${card.date}</span>
                    </div>
                    ${(isAdmin && !card.delivered) ? `<button class="btn btn-success">Confirm Order</button>` : ''}
                </div>
            </div>
        </div>
    `;
    lastRow.appendChild(cardDiv);
});

function handleConfirmOrder(event) {
    var card = event.target.closest(".card");
    if (!card) return;

    var deliveredSpan = card.querySelector(".delivered");
    if (!deliveredSpan || deliveredSpan.textContent.trim() !== "Waiting") return;

    // Change status to "Delivered"
    deliveredSpan.textContent = "Delivered";
    deliveredSpan.classList.remove("waiting");
    deliveredSpan.classList.add("delivered");

    var confirmButton = card.querySelector(".btn-success");
    if (confirmButton) {
        confirmButton.remove();
    }
}



document.addEventListener("click", function(event) {
    if (event.target.matches(".btn-success")) {
        handleConfirmOrder(event);
    }
});
