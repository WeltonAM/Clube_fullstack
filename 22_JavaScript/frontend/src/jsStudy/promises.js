function getData(url){
    return new Promise((resolve, reject) => {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                resolve(this);
            } else if(this.status == 404){
                reject('error');
            }
        };
        
        xhttp.open('GET', url, true);
        xhttp.send();
    });
}

getData('https://reqres.in/api/users')
    .then(data => {
        console.log(JSON.parse(data.responseText)['data']);
    })
    .catch(error => {
        console.log(error);
    });