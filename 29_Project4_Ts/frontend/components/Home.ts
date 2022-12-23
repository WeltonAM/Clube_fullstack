function component()
{
    const render = function()
    {
        return `
        <h3 class="mt-4">Users list</h3>
        <div x-data="listUsers()" x-init="list">
            <table class="table mt-2">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th class="d-flex justify-content-center" scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <template x-for="(user, index) in data" :key="index">
                        <tr>
                        <th scope="row" x-text="user.id"></th>
                            <td x-text="user.firstName"></td>
                            <td x-text="user.lastName"></td>
                            <td x-text="user.email"></td>
                            <td class="d-flex justify-content-center">
                                <a x-bind:href="'/#/user/'+user.id" class="btn btn-outline-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        `;
    };

    return{
        render,
    };
}

export default component();