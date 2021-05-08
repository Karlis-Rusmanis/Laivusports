function request(url, callback) {    //js veidā taisa pieprasījumu uz datu bāzi
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {   //200 ir kad lapa ir veiksmīgi ielādējusies
            callback(this.responseText);     //iekavas nozīmē, ka tiks izpildīta tā f-ija
        }
    }

    xhttp.open('post', url);  //pats pieprasījums datiem
    xhttp.send();
}