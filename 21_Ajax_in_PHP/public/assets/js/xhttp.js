var xhttp = new XMLHttpRequest;

function xmlHttpGet(url, callback, params = '')
{
    xhttp.onreadystatechange = callback;

    xhttp.open('GET', url + '.php' + params, true);

    xhttp.send();
}

function xmlHttpPost(url, callback, params = '')
{
    xhttp.onreadystatechange = callback;

    xhttp.open('POST', url + '.php' + params, true);

    xhttp.send(params);
}

function beforeSend(callback)
{
    if(xhttp.readyState < 4){
        callback();
    }
}

function success(callback)
{
    if(xhttp.readyState == 4 && xhttp.status == 200){
        callback();
    }
}

function error(callback)
{
    xhttp.onerror = callback();
}