import hashInfo from "../helpers/hashInfo";
import http from "../src/helpers/http";

function component()
{
    // const data = function()
    // {
    //     const {param} = hashInfo();
    //     return param();
    // };

    const user = async function(){
        try {
            const {param} = hashInfo();
            const id = param();
            const {data} = await http.get('/user/show', {
                params: {
                    id,
                },
            });
            
            return data;

        } catch (error) {
            console.log(error);
        }
    }

    const render = async function()
    {
        const userData:{
            id:number,
            firstName:string,
            lastName:string,
            email:string,
        } = await user();

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