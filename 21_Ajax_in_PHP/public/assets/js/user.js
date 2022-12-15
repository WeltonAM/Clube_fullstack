// Equivalent to $(document).ready(()=>{})

window.onload = function(){
    let xhttp = new XMLHttpRequest();

    let div_users = document.querySelector('#div-users');

    let btn_users = document.querySelector('#btn-users');
    btn_users.onclick = function(){   
        xhttp.onreadystatechange = function(){
            
            if(this.readyState < 4){
                div_users.innerHTML = `<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`
            }

            if(this.readyState == 4 && this.status == 200){

                let users = JSON.parse(this.responseText);
                
                let table = `<table class="table table-stripped">`;

                table += `<thead><tr><td>First Name</td><td>Last Name</td><td>Email</td></tr></thead>`;

                table += `<tbody>`;

                users.forEach(user => {
                    table += `<tr>`;

                    table += `<td>${user.firstName}</td>`;
                    table += `<td>${user.lastName}</td>`;
                    table += `<td>${user.email}</td>`;

                    table += `</td>`;
                });
                
                table += `</tbody>`;

                table += `</table>`;

                div_users.innerHTML = table;
            }
        }     

        xhttp.open('GET', 'ajax/user.php', true);
        xhttp.send();
    }
    
}