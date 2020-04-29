function switchToRegister()
{
    location.replace('Register.html');
}

function getLogin()
{
    var inputUserName = document.getElementById('username').value;
    var inputUserPassword = document.getElementById('password').value;
    var request = new XMLHttpRequest();
    request.open('GET', 'http://localhost:3000/userdata', true);

    request.onload = function()
    {
        var data = JSON.parse(this.response);
        var falseInput = 0;

        for(var i = 0; i < data.length; i++)
        {
            if(data[i].username === inputUserName && data[i].password === inputUserPassword)
            {
                falseInput++;
                location.replace('bootstrap-4.4.1-dist/Startseite.html');
            }
        }

        if(falseInput === 0)
        {
            document.getElementById('falscherInput').innerHTML = "False password / username";
        }
    }
    request.send();
}

function backToLogin()
{
    location.replace('Login.html');
}

//Register Website
function setRegister()
{
    var check;
    var pas = document.getElementById('Ipassword').value;
    //password check
    if(pas.length > 5)
    {
        check = true;
    }

    if(check)
    {
        //post data to server
        document.getElementById('correctRegister').innerHTML = 'Registered!';
        document.getElementById('falseRegister').innerHTML = '';
        var post = new XMLHttpRequest();
        var passw = document.getElementById('Ipassword').value;
        var usern = document.getElementById('Iusername').value;

        post.open('POST', 'http://localhost:3000/userdata');
        post.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        post.send(JSON.stringify({
        "id": post.length,
        "username": usern,
        "password": passw
        }));
    }
    else
    {
        document.getElementById('falseRegister').innerHTML = 'Password to short (more than 5 characters)';
    }
}

function loadAllProducts()
{
    var request = new XMLHttpRequest();
    request.open('GET', 'http://localhost3000/productdata', true);
    var products = document.getElementById('products');
    const container = document.createElement('div');
    container.setAttribute('class', 'container');

    products.appendChild(container);

    request.onload = function()
    {
        var card;
        var data = JSON.parse(this.response);

        for(var i = 0; i < data.length; i++)
        {
            card = document.createElement('div');
            card.setAttribute('class', 'card');
            var productImage = document.createElement('img');
            productImage.src = data[i].imagename;
            img.setAttribute('class', 'card-img-top');
            var body = document.createElement('div');
            body.setAttribute('class', 'card-body');
            var text = document.createElement('p');
            text.setAttribute('card-text');
            text = data[i].productprize;

            container.appendChild(card);
            card.appendChild(img);
            body.appendChild(text);
            card.appendChild(body);
        }
    }
    request.send();
}