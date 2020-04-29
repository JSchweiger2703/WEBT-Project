    var request = new XMLHttpRequest();
    const products = document.getElementById('Snowboards');
    var container = document.createElement('div');
    products.appendChild(container);

    request.open('GET', 'http://localhost:3000/productdata', true);
    request.onload = function()
    {
        var card;
        var data = JSON.parse(this.response);

        for(var i = 0; i < data.length; i++)
        {
            card = document.createElement('div');
            card.setAttribute('class', 'card');

            var prodimg = document.createElement('img');
            prodimg.src = data[i].imagename;

            var prdctname = document.createElement('h1');
            prdctname.textContent = data[i].productname;

            var prize = document.createElement('p');
            prize.setAttribute('class', 'prize');
            prize.textContent = data[i].productprize;

            var prdctinfo = document.createElement('p');
            prdctinfo.textContent = data[i].productinformation;

            var button = document.createElement('button');
            button.textContent = "Add To Cart";

            container.appendChild(card);
            card.appendChild(prodimg);
            card.appendChild(prdctname);
            card.appendChild(prize);
            card.appendChild(prdctinfo);
            card.appendChild(button);

            var abstand = document.createElement('br');
            container.appendChild(abstand);
        }
    }
request.send();