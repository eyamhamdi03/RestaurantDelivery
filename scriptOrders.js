var cardsOrders = [
    { name: "Chicken Salad", price: "10.25 DT", date: "12/12/2021", delivered: true },
    { name: "Margherita Pizza", price: "12.50 DT", date: "12/12/2021", delivered: false },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", date: "12/12/2021", delivered: true },
    { name: "Classic Cheeseburger", price: "8.99 DT", date: "12/12/2021", delivered: false },
    { name: "Chicken Salad", price: "10.25 DT", date: "12/12/2021", delivered: true },
    { name: "Margherita Pizza", price: "12.50 DT", date: "12/12/2021", delivered: false },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", date: "12/12/2021", delivered: true },
    { name: "Classic Cheeseburger", price: "8.99 DT", date: "12/12/2021", delivered: false },

];
var isAdmin = true;
var OrdersRow = document.getElementById("OrdersRow");
var rows = document.querySelectorAll(".row");

cardsOrders.sort((a, b) => (a.delivered === b.delivered) ? 0 : a.delivered ? 1 : -1);

cardsOrders.forEach(function(card, index) {
    if (index % 4 === 0) {
        var newRow = document.createElement("div");
        newRow.classList.add("row", "justify-content-around");
        OrdersRow.appendChild(newRow);
        rows = document.querySelectorAll(".row");
    }
    var lastRow = rows[rows.length - 1];
    var cardDiv = document.createElement("div");
    cardDiv.classList.add("col", "d-flex", "align-items-stretch");
    cardDiv.innerHTML = `
        <div class="card-wrapper">
            <div class="card h-100">
                <div class="card-body d-flex flex-column" data-index="${index}">
                    <div class="card-overlay">
                        <span class="${card.delivered ? 'delivered' : 'waiting'}">${card.delivered ? 'Delivered' : 'Waiting'}</span>
                    </div>
                    <h5 class="card-title" style="margin-top: 10px; margin-bottom: 10px;">${card.name}</h5>
                    <div class="d-flex justify-content-between align-items-center flex-grow-1" style="margin-bottom: 30px;">
                        <div class="price">${card.price}</div>
                        <span class="date">${card.date}</span>
                    </div>
                    ${(isAdmin && !card.delivered) ? `<button class="btn btn-success mt-auto" onclick="handleConfirmOrder(event)">Confirm Order</button>` : ''}
                </div>
            </div>
        </div>
    `;
    lastRow.appendChild(cardDiv);
});

function handleConfirmOrder(event) {
    const cardBody = event.target.closest('.card-body');
    if (cardBody) {
        const index = parseInt(cardBody.dataset.index);
        cardsOrders[index].delivered = true;
        cardBody.querySelector('.card-overlay span').textContent = 'Delivered';
        cardBody.querySelector('.card-overlay span').classList.replace('waiting', 'delivered');
        event.target.remove(); 

    }
}
