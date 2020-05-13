var request = new XMLHttpRequest();
var products = document.getElementById('prods').getElementsByTagName('tbody')[0];
var data;
request.open('GET', 'http://localhost:3000/productdata', true);
request.onload = function () {
    var card;
    var trow;
    data = JSON.parse(this.response);
    var counter = 0;

    for (var i = 0; i < data.length; i++) {
        counter++;
        
        if(counter === 1)
        {
            trow = products.insertRow();
        }

        var tcell = trow.insertCell(counter - 1);

        card = document.createElement('div');
        card.setAttribute('class', 'card h-100');
        card.style = "width: 18rem;";

        var prodimg = document.createElement('img');
        prodimg.src = data[i].imagename;
        prodimg.setAttribute('class', 'card-img-top');

        var cardBody = document.createElement('div');
        cardBody.setAttribute('class', 'card-body');

        var prdctname = document.createElement('h5');
        prdctname.setAttribute('class', 'card-title');
        prdctname.textContent = data[i].productname;
        prdctname.id = data[i].id;

        var prize = document.createElement('p');
        prize.setAttribute('class', 'card-text');
        prize.textContent = data[i].productprize + ",-";

        var button = document.createElement('button');
        button.setAttribute('class', 'btn btn-primary');
        button.textContent = "Add To Cart";
        button.onclick = searchInShopCart;
        button.id = data[i].id;

        tcell.appendChild(card);
        card.appendChild(prodimg);
        card.appendChild(cardBody);
        cardBody.appendChild(prdctname);
        cardBody.appendChild(prize);
        cardBody.appendChild(button);

        if(counter === 3)
        {
            counter = 0;
        }
    }
}
request.send();

function searchInShopCart() {
    const id = this.id;

    var update = new XMLHttpRequest();
    update.open('GET', 'http://localhost:3000/shopcartdata', true);
    update.onload = function () {
        var updateData = JSON.parse(this.response);

        for (var j = 0; j < updateData.length; j++) {
            if (updateData[j].id === id) {
                return;
            }
        }
    }
    update.send();

    shopdata = new XMLHttpRequest();
    shopdata.open('POST', 'http://localhost:3000/shopcartdata');
    shopdata.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    shopdata.send(JSON.stringify({
        "id": id,
        "productname": data[id].productname,
        "productprize": data[id].productprize
    }));
}