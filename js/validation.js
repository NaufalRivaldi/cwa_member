function valLogin() {
    var username = $('#username').val();
    var password = $('#password').val();

    if (username != '' && password != '') {
        return true;
    } else {
        alert('Data masih ada yang belum terisi!');
    }
}