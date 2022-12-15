// Equivalent to $(document).ready(()=>{})

window.onload = function(){
    let div_users = document.querySelector('#div-users');
    
    let div_create = document.querySelector('#div-create');
    
    let div_search = document.querySelector('#div-search');
    
    let btn_users = document.querySelector('#btn-users');

    let form_signup = document.querySelector('#form-signup');

    let form_search = document.querySelector('#form-search');

    function usersList(users)
    {
        let table = `<table class="table table-striped">`;

        table += `<thead><tr><td>First Name</td><td>Last Name</td><td>Email</td></tr></thead>`;

        table += `<tbody class="table-group-divider">`;

        users.forEach(user => {
            table += `<tr>`;

            table += `<td>${user.firstName}</td>`;
            table += `<td>${user.lastName}</td>`;
            table += `<td>${user.email}</td>`;

            table += `</td>`;
        });
        
        table += `</tbody>`;

        table += `</table>`;

        return table;
    }

    form_search.addEventListener('submit', (e)=>{
        e.preventDefault();
        
        let form = new FormData(form_search);

        xmlHttpPost('ajax/search', ()=>{
            beforeSend(()=>{
                div_search.innerHTML = `<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`
            });

            success(()=>{

                let response = xhttp.responseText;

                if(response == 'Not found'){
                    div_search.innerHTML = 'Not found!';
                } else {

                    let users = JSON.parse(response);
    
                    div_search.innerHTML = usersList(users);
                }
            });

        }, form);

    });

    form_signup.onsubmit = function(e){

        e.preventDefault();

        let form = new FormData(form_signup);

        xmlHttpPost('ajax/create', ()=>{
            beforeSend(()=>{
                div_create.innerHTML = `<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`
            });

            success(()=>{
                let response = xhttp.responseText;

                if(response == 'registered'){
                    div_create.innerHTML = 'Successfully signed!';
                } else {
                    div_create.innerHTML = 'Something went wrong';
                }
            });

        }, form);
    }

    
    btn_users.onclick = function(){   
        xmlHttpGet('ajax/user', ()=>{
            
            beforeSend(()=>{
                div_users.innerHTML = `<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`
            });

            success(()=>{
                let users = JSON.parse(xhttp.responseText);

                div_users.innerHTML = usersList(users);
            });

            // error(()=>{
            //     div_users.innerHTML = 'Something went wrong';
            // });

        });
    }
}