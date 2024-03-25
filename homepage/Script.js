
        fetch('nav.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('nav-placeholder').innerHTML = data;
            });


var cards = [
    { name: "Chicken Salad", price: "10.25 DT", photo: "Food Photo.png" },

    { name: "Margherita Pizza", price: "12.50 DT", photo: "2.png" },
    { name: "Chicken Alfredo Pasta", price: "15.75 DT", photo: "3.png" },
    { name: "Classic Cheeseburger", price: "8.99 DT", photo: "4.png" },
   
];

var menuRow = document.getElementById("menuRow");

cards.forEach(function(card, index) {
  
    if (index % 4 === 0) {
       
        var newRow = document.createElement("div");
        newRow.classList.add("row");
        menuRow.appendChild(newRow);
    }

    var rows = document.querySelectorAll(".row");
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
                    <a href="#" class="btn-primary btn">Order Now !</a>
                </div>
            </div>
        </div>
    `;
    lastRow.appendChild(cardDiv);
});
