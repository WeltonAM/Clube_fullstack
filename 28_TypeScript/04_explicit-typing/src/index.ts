let myName:string;
myName = 'Juliana';

let age:number = 27;

let isAdmin:boolean|string = true;

let names:(string|number)[] = ['Juliana', 'Karla'];
names.push('Frô');
names.push(27);

let person: {
    name: string,
    age: number
}

// person = [] ## missing the following types

person = {
    name: 'Juliana',
    age: 27
}

// ## Tuplas
let data:[string, number][];
data = [
    ['Juliana', 27],
    ['Karla', 12]
]; 

console.log(data);