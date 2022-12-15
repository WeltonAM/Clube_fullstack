$(document).ready(function(){

    let div_users = $('#div-users');
    
    let div_create = $('#div-create');
    
    let div_search = $('#div-search');
    
    let btn_users = $('#btn-users');

    let form_signup = $('#form-signup');

    let form_search = $('#form-search');

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

    btn_users.on('click', ()=>{
        $.ajax({
            url: 'ajax/user.php',
            type: 'GET',
            data: '',
            dataType: 'json',
            beforeSend: ()=>{
                div_users.html(`<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`);
            },
            success: (response)=>{
                div_users.html(usersList(response));
            }
        });
    }); 

    form_signup.on('submit', (e)=>{
        e.preventDefault();

        $.ajax({
            url: 'ajax/create.php',
            type: 'POST',
            data: '',
            beforeSend: ()=>{
                div_create.html(`<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`);
            },
            success: (response)=>{
                if(response == 'registered'){
                    div_create.html('Successfully signed!');
                } else {
                    div_create.html('Something went wrong');
                }
            }
        });
    });

    form_search.on('submit', (e)=>{
        e.preventDefault();

        $.ajax({
            url: 'ajax/create.php',
            type: 'POST',
            data: '',
            dataType: 'json',
            beforeSend: ()=>{
                div_search.html(`<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>`);
            },
            success: (response)=>{
                if(response == 'Not found'){
                    div_search.html('Not found!');
                } else {
                    div_search.html(usersList(users));
                }
            }
        });
    });

});