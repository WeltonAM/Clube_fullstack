function fn(name){
    console.log(name);
}

function person(callback){
    let name = 'Juliana';
    callback(name);
}

person(fn);

console.log("---------------");

function getData(url, callback){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            callback(this);
        }
    };

    xhttp.open('GET', url, true);
    xhttp.send();
}