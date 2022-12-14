// Equivalent to $(document).ready(()=>{})

window.onload = function(){
    let xhttp = new XMLHttpRequest();

    let btn_users = document.querySelector('#btn-users');
    btn_users.onclick = function(){   
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState == 4 && xhttp.status == 200){
                console.log(xhttp.responseText);
            }
        }     

        xhttp.open('GET', 'ajax/user.php', true);
        xhttp.send();
    }
    
}