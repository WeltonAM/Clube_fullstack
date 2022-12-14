// Equivalent to $(document).ready(()=>{})

window.onload = function(){
    let xhttp = new XMLHttpRequest();

    let btn_users = document.querySelector('#btn-users');
    btn_users.onclick = function(){   
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
            }
        }     

        xhttp.open('GET', 'ajax/user.php', true);
        xhttp.send();
    }
    
}