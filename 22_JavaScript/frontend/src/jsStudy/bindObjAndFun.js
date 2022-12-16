let user = {name:'Juliana', age:27};

function person(age){
    return (`My name is ${this.name} and my age is ${age}`);
} 

// let person1 = person.call(user, 26);
// let person1 = person.bind(user, 26);
let person1 = person.apply(user, [26]);

console.log(person1);