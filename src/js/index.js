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


    xhr.open('POST', '/auth.php', true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onreadystatechange = function () {
        if (xhr.readyState != 4) return;

        console.log('ГОТОВо');

        if (xhr.status != 200) {
            console.log(xhr.status + ':' + xhr.statusText);
        } else {
            console.log(xhr.responseText);
        }
    };

    xhr.send(json);

    // console.log(login);
    // console.log(password);

}