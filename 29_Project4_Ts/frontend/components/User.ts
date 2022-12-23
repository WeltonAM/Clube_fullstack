import hashInfo from "../helpers/hashInfo";

function component()
{
    // const data = function()
    // {
    //     const {param} = hashInfo();
    //     return param();
    // };

    const render = function()
    {
        return `
            <form id="formCreateUser">
                <input id="firstName" >
                <button type="submit">Edit</button>
            </form>
        `;
    };

    const action = function(){
        const formCreateUser = document.querySelector('#formCreateUser') as HTMLFormElement;
        const firstName = document.querySelector('#firstName') as HTMLInputElement;
        
        formCreateUser.addEventListener('submit', (e)=>{
            e.preventDefault();
            console.log('create', firstName.value)
        })

    }

    return{
        render,
        action,
    };
}

export default component();