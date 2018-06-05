function ajax(url, json, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader("Content-Type", 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {
            callback(xhr.responseText);
        } else {
            console.log(xhr.status + ':' + xhr.statusText);
        }

    };
    xhr.send(json);
}


function loginButton() {

    console.log('кнопка нажата');

    let login = document.getElementById('header__inputLogin').value;
    let password = document.getElementById('header__inputPassword').value;

    login = encodeURI(login);
    password = encodeURI(password);

    let json = JSON.stringify({
        login: login,
        pass: password,
        rememberme: 0,
        metod: 'ajax'
    });

    ajax('index.php', json, function (response) {
        let wrap = document.getElementById('header__auth');
        wrap.innerHTML = response;
    })

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

