// Equivalent to $(document).ready(()=>{})

window.onload = function(){
    let xhttp = new XMLHttpRequest();

    let div_users = document.querySelector('#div-users');

    let btn_users = document.querySelector('#btn-users');
    btn_users.onclick = function(){   
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

                let users = JSON.parse(this.responseText);
                console.log(users);
            }
        }     

        xhttp.open('GET', 'ajax/user.php', true);
        xhttp.send();
    }
    
}