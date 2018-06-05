'use strict';

function ajax(url, json, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader("Content-Type", 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            callback(xhr.responseText);
        } else {
            console.log(xhr.status + ':' + xhr.statusText);
        }
    };
    xhr.send(json);
}

function loginButton() {

    console.log('кнопка нажата');

    var login = document.getElementById('header__inputLogin').value;
    var password = document.getElementById('header__inputPassword').value;

    login = encodeURI(login);
    password = encodeURI(password);

    var json = JSON.stringify({
        login: login,
        pass: password,
        rememberme: 0,
        metod: 'ajax'
    });

    ajax('index.php', json, function (response) {
        var wrap = document.getElementById('header__auth');
        wrap.innerHTML = response;
    });
}

function exitButton() {
    console.log('выход');

    var json = JSON.stringify({
        logout: 1
    });

    var xhr = new XMLHttpRequest();
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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImluZGV4LmpzIl0sIm5hbWVzIjpbImFqYXgiLCJ1cmwiLCJqc29uIiwiY2FsbGJhY2siLCJ4aHIiLCJYTUxIdHRwUmVxdWVzdCIsIm9wZW4iLCJzZXRSZXF1ZXN0SGVhZGVyIiwib25yZWFkeXN0YXRlY2hhbmdlIiwicmVhZHlTdGF0ZSIsInN0YXR1cyIsInJlc3BvbnNlVGV4dCIsImNvbnNvbGUiLCJsb2ciLCJzdGF0dXNUZXh0Iiwic2VuZCIsImxvZ2luQnV0dG9uIiwibG9naW4iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwidmFsdWUiLCJwYXNzd29yZCIsImVuY29kZVVSSSIsIkpTT04iLCJzdHJpbmdpZnkiLCJwYXNzIiwicmVtZW1iZXJtZSIsIm1ldG9kIiwicmVzcG9uc2UiLCJ3cmFwIiwiaW5uZXJIVE1MIiwiZXhpdEJ1dHRvbiIsImxvZ291dCJdLCJtYXBwaW5ncyI6Ijs7QUFBQSxTQUFTQSxJQUFULENBQWNDLEdBQWQsRUFBbUJDLElBQW5CLEVBQXlCQyxRQUF6QixFQUFtQztBQUMvQixRQUFJQyxNQUFNLElBQUlDLGNBQUosRUFBVjtBQUNBRCxRQUFJRSxJQUFKLENBQVMsTUFBVCxFQUFpQkwsR0FBakIsRUFBc0IsSUFBdEI7QUFDQUcsUUFBSUcsZ0JBQUosQ0FBcUIsY0FBckIsRUFBcUMsa0RBQXJDO0FBQ0FILFFBQUlJLGtCQUFKLEdBQXlCLFlBQVk7QUFDakMsWUFBS0osSUFBSUssVUFBSixJQUFrQixDQUFuQixJQUEwQkwsSUFBSU0sTUFBSixJQUFjLEdBQTVDLEVBQWtEO0FBQzlDUCxxQkFBU0MsSUFBSU8sWUFBYjtBQUNILFNBRkQsTUFFTztBQUNIQyxvQkFBUUMsR0FBUixDQUFZVCxJQUFJTSxNQUFKLEdBQWEsR0FBYixHQUFtQk4sSUFBSVUsVUFBbkM7QUFDSDtBQUVKLEtBUEQ7QUFRQVYsUUFBSVcsSUFBSixDQUFTYixJQUFUO0FBQ0g7O0FBR0QsU0FBU2MsV0FBVCxHQUF1Qjs7QUFFbkJKLFlBQVFDLEdBQVIsQ0FBWSxlQUFaOztBQUVBLFFBQUlJLFFBQVFDLFNBQVNDLGNBQVQsQ0FBd0Isb0JBQXhCLEVBQThDQyxLQUExRDtBQUNBLFFBQUlDLFdBQVdILFNBQVNDLGNBQVQsQ0FBd0IsdUJBQXhCLEVBQWlEQyxLQUFoRTs7QUFFQUgsWUFBUUssVUFBVUwsS0FBVixDQUFSO0FBQ0FJLGVBQVdDLFVBQVVELFFBQVYsQ0FBWDs7QUFFQSxRQUFJbkIsT0FBT3FCLEtBQUtDLFNBQUwsQ0FBZTtBQUN0QlAsZUFBT0EsS0FEZTtBQUV0QlEsY0FBTUosUUFGZ0I7QUFHdEJLLG9CQUFZLENBSFU7QUFJdEJDLGVBQU87QUFKZSxLQUFmLENBQVg7O0FBT0EzQixTQUFLLFdBQUwsRUFBa0JFLElBQWxCLEVBQXdCLFVBQVUwQixRQUFWLEVBQW9CO0FBQ3hDLFlBQUlDLE9BQU9YLFNBQVNDLGNBQVQsQ0FBd0IsY0FBeEIsQ0FBWDtBQUNBVSxhQUFLQyxTQUFMLEdBQWlCRixRQUFqQjtBQUNILEtBSEQ7QUFLSDs7QUFFRCxTQUFTRyxVQUFULEdBQXNCO0FBQ2xCbkIsWUFBUUMsR0FBUixDQUFZLE9BQVo7O0FBRUEsUUFBSVgsT0FBT3FCLEtBQUtDLFNBQUwsQ0FBZTtBQUN0QlEsZ0JBQVE7QUFEYyxLQUFmLENBQVg7O0FBSUEsUUFBSTVCLE1BQU0sSUFBSUMsY0FBSixFQUFWO0FBQ0FELFFBQUlFLElBQUosQ0FBUyxNQUFULEVBQWlCLFlBQWpCLEVBQStCLElBQS9CO0FBQ0FGLFFBQUlHLGdCQUFKLENBQXFCLGNBQXJCLEVBQXFDLGdDQUFyQzs7QUFFQUgsUUFBSUksa0JBQUosR0FBeUIsWUFBWTtBQUNqQyxZQUFJSixJQUFJSyxVQUFKLElBQWtCLENBQXRCLEVBQXlCOztBQUV6QkcsZ0JBQVFDLEdBQVIsQ0FBWSxRQUFaOztBQUVBLFlBQUlULElBQUlNLE1BQUosSUFBYyxHQUFsQixFQUF1QjtBQUNuQkUsb0JBQVFDLEdBQVIsQ0FBWVQsSUFBSU0sTUFBSixHQUFhLEdBQWIsR0FBbUJOLElBQUlVLFVBQW5DO0FBQ0gsU0FGRCxNQUVPO0FBQ0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNIO0FBQ0osS0FoQkQ7O0FBa0JBVixRQUFJVyxJQUFKLENBQVNiLElBQVQ7QUFFSCIsImZpbGUiOiJpbmRleC5qcyIsInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIGFqYXgodXJsLCBqc29uLCBjYWxsYmFjaykge1xyXG4gICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgeGhyLm9wZW4oJ1BPU1QnLCB1cmwsIHRydWUpO1xyXG4gICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoXCJDb250ZW50LVR5cGVcIiwgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZDsgY2hhcnNldD1VVEYtOCcpO1xyXG4gICAgeGhyLm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBpZiAoKHhoci5yZWFkeVN0YXRlID09IDQpICYmICh4aHIuc3RhdHVzID09IDIwMCkpIHtcclxuICAgICAgICAgICAgY2FsbGJhY2soeGhyLnJlc3BvbnNlVGV4dCk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coeGhyLnN0YXR1cyArICc6JyArIHhoci5zdGF0dXNUZXh0KTtcclxuICAgICAgICB9XHJcblxyXG4gICAgfTtcclxuICAgIHhoci5zZW5kKGpzb24pO1xyXG59XHJcblxyXG5cclxuZnVuY3Rpb24gbG9naW5CdXR0b24oKSB7XHJcblxyXG4gICAgY29uc29sZS5sb2coJ9C60L3QvtC/0LrQsCDQvdCw0LbQsNGC0LAnKTtcclxuXHJcbiAgICBsZXQgbG9naW4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnaGVhZGVyX19pbnB1dExvZ2luJykudmFsdWU7XHJcbiAgICBsZXQgcGFzc3dvcmQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnaGVhZGVyX19pbnB1dFBhc3N3b3JkJykudmFsdWU7XHJcblxyXG4gICAgbG9naW4gPSBlbmNvZGVVUkkobG9naW4pO1xyXG4gICAgcGFzc3dvcmQgPSBlbmNvZGVVUkkocGFzc3dvcmQpO1xyXG5cclxuICAgIGxldCBqc29uID0gSlNPTi5zdHJpbmdpZnkoe1xyXG4gICAgICAgIGxvZ2luOiBsb2dpbixcclxuICAgICAgICBwYXNzOiBwYXNzd29yZCxcclxuICAgICAgICByZW1lbWJlcm1lOiAwLFxyXG4gICAgICAgIG1ldG9kOiAnYWpheCdcclxuICAgIH0pO1xyXG5cclxuICAgIGFqYXgoJ2luZGV4LnBocCcsIGpzb24sIGZ1bmN0aW9uIChyZXNwb25zZSkge1xyXG4gICAgICAgIGxldCB3cmFwID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2hlYWRlcl9fYXV0aCcpO1xyXG4gICAgICAgIHdyYXAuaW5uZXJIVE1MID0gcmVzcG9uc2U7XHJcbiAgICB9KVxyXG5cclxufVxyXG5cclxuZnVuY3Rpb24gZXhpdEJ1dHRvbigpIHtcclxuICAgIGNvbnNvbGUubG9nKCfQstGL0YXQvtC0Jyk7XHJcblxyXG4gICAgbGV0IGpzb24gPSBKU09OLnN0cmluZ2lmeSh7XHJcbiAgICAgICAgbG9nb3V0OiAxXHJcbiAgICB9KTtcclxuXHJcbiAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICB4aHIub3BlbignUE9TVCcsICcvaW5kZXgucGhwJywgdHJ1ZSk7XHJcbiAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcihcIkNvbnRlbnQtVHlwZVwiLCBcImFwcGxpY2F0aW9uL2pzb247Y2hhcnNldD1VVEYtOFwiKTtcclxuXHJcbiAgICB4aHIub25yZWFkeXN0YXRlY2hhbmdlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGlmICh4aHIucmVhZHlTdGF0ZSAhPSA0KSByZXR1cm47XHJcblxyXG4gICAgICAgIGNvbnNvbGUubG9nKCfQk9Ce0KLQntCS0L4nKTtcclxuXHJcbiAgICAgICAgaWYgKHhoci5zdGF0dXMgIT0gMjAwKSB7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHhoci5zdGF0dXMgKyAnOicgKyB4aHIuc3RhdHVzVGV4dCk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgLy8gY29uc29sZS5sb2coeGhyLnJlc3BvbnNlVGV4dCk7XHJcblxyXG4gICAgICAgICAgICAvLyBsZXQgbG9naW4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnaGVhZGVyX19sb2dpbldyYXBwZXInKTtcclxuICAgICAgICAgICAgLy8gbGV0IGxvZ2VkID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2hlYWRlcl9fbG9nZWRXcmFwcGVyJyk7XHJcbiAgICAgICAgICAgIC8vXHJcbiAgICAgICAgICAgIC8vIGxvZ2luLmNsYXNzTmFtZSA9ICdkaXNwbGF5QmxvY2snO1xyXG4gICAgICAgICAgICAvLyBsb2dlZC5jbGFzc05hbWUgPSAnZGlzcGxheU5vbmUnO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcblxyXG4gICAgeGhyLnNlbmQoanNvbik7XHJcblxyXG59Il19
