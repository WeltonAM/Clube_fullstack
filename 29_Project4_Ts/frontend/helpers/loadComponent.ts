import Home from "../components/Home";
import CreateUser from "../components/CreateUser";
import Error404 from "../components/Error404";
import User from "../components/User";

interface routerInterface<T>{
    [id:string]:T,
}
interface componentInterface{
    render: () => string | Promise<string>,
    action?: () => void,
}

const routes:routerInterface<componentInterface> = {
    '/': Home,
    '/user/create': CreateUser,
    '/user/:id': User,
    // '/login': CreateUser,
}

const loadComponentHtml = async function(component:string, placeholder:string, uri:string)
{
    const content = document.querySelector("#content") as HTMLDivElement;

    const newUri = component + placeholder;

    let componentHtml = routes[uri] ?? routes[newUri];

    if(!componentHtml){
        componentHtml = Error404;
    }

    content.innerHTML = await componentHtml.render();

    if(componentHtml.action){
        componentHtml.action();
    }
}

export default loadComponentHtml;