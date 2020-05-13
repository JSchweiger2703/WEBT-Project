var request = new XMLHttpRequest();
var textfeld = document.getElementById('prods');
request.open('GET', 'http://localhost:3000/shopcartdata', true);
request.onload = function()
{
    var data = JSON.parse(this.response);
    let sum = 0;
    
    for(var i = 0; i < data.length; i++)
    {
        var table = document.createElement('tr');
        var idrow = document.createElement('th');
        idrow.textContent = data[i].id;
        idrow.scope = "row";
        var prodnamerow = document.createElement('td');
        prodnamerow.textContent = data[i].productname;
        var prodprizerow = document.createElement('td');
        prodprizerow.textContent = data[i].productprize + ",-";
        sum = sum + Number(data[i].productprize);
        textfeld.appendChild(table);
        table.appendChild(idrow);
        table.appendChild(prodnamerow);
        table.appendChild(prodprizerow);
    }
    var row = document.createElement('tr');
    var prizeSum = document.createElement('th');
    console.log(sum);
    textfeld.appendChild(row);
    var prizetext = document.createElement('th');
    prizetext.textContent = "SUM";
    row.appendChild(prizetext);
    row.appendChild(document.createElement('th'));
    sum = sum.toString();
    sum = sum + ",-"
    prizeSum.textContent = sum;
    row.appendChild(prizeSum);
}
request.send();