function component()
{
    const render = function()
    {
        return `
        <div x-data="create()">

            <h4 class="mb-3 mt-4">Create User</h4>
            <form action="" method="" x-on:submit.prevent="createUser">
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" x-model="user.firstName">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" x-model="user.lastName">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" x-model="user.email">
                </div>
                
                <div class="mb-1">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" x-model="user.password">
                </div>

                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                <button type="submit" class="btn btn-outline-primary btn-sm mt-4">Create</button>

            </form>
        
        </div>
        `;
    };

    return{
        render,
    };
}

export default component();