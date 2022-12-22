import {name} from './test';
import {Person} from './classes/Person';

const person = new Person("Juliana", 27);
person.myName = 'Karla';

console.log(person.info());

const form = document.querySelector('form')!;
const link = document.querySelector('a') as HTMLAnchorElement;

form.addEventListener('onchange', ()=>{
    
});