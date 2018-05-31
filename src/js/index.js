function loginButton() {

    console.log('кнопка нажата');

    let login = document.getElementById('header__inputLogin').value;
    let password = document.getElementById('header__inputPassword').value;

    login = encodeURI(login);
    password = encodeURI(password);

    let json = JSON.stringify({
        login: login,
        pass: password,
        metod: 'ajax'
    });


    let xhr = new XMLHttpRequest();

    xhr.open('POST', '/index.php', true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200))
        {
            console.log(xhr.responseText);
        } else {
            console.log(xhr.status + ':' + xhr.statusText);
        }

    };

    xhr.send(json);

}

function exitButton() {
    console.log('выход');

    let json = JSON.stringify({
        logout: 1
    });

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/index.php', true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onreadystatechange = function () {
        if (xhr.readyState != 4) return;

        console.log('ГОТОВо');

        if (xhr.status != 200) {
            console.log(xhr.status + ':' + xhr.statusText);
        } else {
            // console.log(xhr.responseText);

            // let login = document.getElementById('header__loginWrapper');
            // let loged = document.getElementById('header__logedWrapper');
            //
            // login.className = 'displayBlock';
            // loged.className = 'displayNone';
        }
    };

    xhr.send(json);

}

function loginButtonForm() {

    let login = document.getElementById('header__inputLoginForm').value;
    let password = document.getElementById('header__inputPasswordForm').value;

    let json = JSON.stringify({
        login: login,
        pass: password,
        metod: 'ajax'
    });

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/auth.php', true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {

            console.log(xhr.responseText);


        } else {
            console.log(xhr.status + ':' + xhr.statusText);
        }
    };

    xhr.send(json);





}