import "alpinejs";
import create from './create';
import { userCreateInterface } from "../interfaces/userCreateInterface";
import Home from "../components/Home";
import CreateUser from "../components/CreateUser";

function loadComponent(){
    const content = document.querySelector("#content") as HTMLDivElement;

    content.innerHTML = Home.render();
    // content.innerHTML = CreateUser.render();
}

loadComponent();
window.addEventListener('hashchange', ()=>{
    loadComponent();
});

declare global {
    interface Window {
        create: () => userCreateInterface;
    }
}

window.create = create;