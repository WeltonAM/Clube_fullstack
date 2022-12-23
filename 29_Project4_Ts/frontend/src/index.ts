import "alpinejs";
import create from './create';
import listUsers from './listUsers';
import { userCreateInterface } from "../interfaces/userCreateInterface";
import hashInfo from "../helpers/hashInfo";
import loadComponentHtml from "../helpers/loadComponent";
import listUsersInterface from "../interfaces/listUsersInterface";

function loadComponent(){

    const {component, placeholder, uri} = hashInfo();

    loadComponentHtml(component, placeholder, uri);
}

loadComponent();
window.addEventListener('hashchange', ()=>{
    loadComponent();
});

declare global {
    interface Window {
        create: () => userCreateInterface;
        listUsers: () => listUsersInterface;
    }
}

window.create = create;
window.listUsers = listUsers;